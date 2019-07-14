<?php

namespace App\Http\Controllers;

use App\Model;
use HtmlValidator\Exception\ServerException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class SiteMapController extends Controller
{
  public function __construct()
  {
  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  private function viewIndex($addeData = [])
  {
    $history = Model\CheckHistory::select()->orderByDesc('revision')->first();
    $pages = Model\SiteMapPage::orderBy('path')->get();
    $checkHistories = [];
    if ($history && !$history->is_passed) {
      foreach ($pages as $page) {
        $allErrors = Model\CheckHistoryDetail::select()
          ->where('history_id', $history->id)
          ->where('page_id', $page->id)
          ->get();

        $page->errors = [];
        foreach ($allErrors as $error) {
          if (!isset($page->errors[$error->key])) $page->errors[$error->key] = [];
          $page->errors[$error->key][] = $error;
        }
      }
    }


    $data = [
      'siteMap' => Model\SiteMap::all()[0],
      'pages' => $pages,
      'isPassed' => $history && $history->is_passed,
      'checkHistories' => $checkHistories,
      'flashMessages' => $addeData['flashMessages'] ?? []
    ];

    return view('sitemap.index', $data, $addeData);
  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index()
  {
    return $this->viewIndex();
  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function store()
  {
    $msg = $this->update();

    return $this->viewIndex([
      'flashMessages' => [$msg]
    ]);
  }

  /**
   * @return Model\ResultMessage
   * @throws \Exception
   */
  protected function update()
  {

    $postSiteMap = Request::all('sitemap');
    $postPages = Request::all('pages');

    $msg = new Model\ResultMessage;
    $msg->key = 'system';

    try {
      DB::beginTransaction();
      $siteMap = Model\SiteMap::all()->first();
      if ($siteMap instanceof Model\SiteMap) {
        $siteMap->update($postSiteMap['sitemap']);

        foreach ($postPages['pages'] as $postPage) {
          $postPage = array_merge([
            'title_use_common' => 0,
            'keywords_use_common' => 0,
            'description_use_common' => 0,
            'og_title_use_common' => 0,
            'og_url_use_common' => 0,
            'og_description_use_common' => 0,
            'og_image_use_common' => 0,
            'favicon_use_common' => 0,
            'charset_use_common' => 0,
          ], $postPage);

          $pageId = $postPage['id'];
          unset($postPage['id']);
          if ($pageId === 'new') {
            $page = new Model\SiteMapPage($postPage);
            $page->save();
          } else {
            $page = Model\SiteMapPage::find((int)$pageId);
            $page->update($postPage);
//            $page->save();
          }
        }
      }
      DB::commit();

      $msg->type = 'success';
      $msg->message = '更新完了しました';

    } catch (\Exception $e) {
      dump($e);
      DB::rollBack();

      $msg->type = 'error';
      $msg->message = '更新失敗しました';
    }

    return $msg;
  }

  protected function makeErrorMessage($key, $message)
  {
    $msg = new Model\ResultMessage;
    $msg->key = $key;
    $msg->type = 'error';
    $msg->message = $message;
    return $msg;
  }

  private function validateHtml(\PHPHtmlParser\Dom $parser)
  {

  }

  private function validateCss(\PHPHtmlParser\Dom $parser)
  {

  }

  private function getMetaContent(\PHPHtmlParser\Dom $parser, $key)
  {
    return $parser
      ->find('meta[name="' . $key . '"]')[0]
      ->getAttribute('content');
  }

  private function getMetaCount(\PHPHtmlParser\Dom $parser, $key)
  {
    return count($parser->find('meta[name="' . $key . '"]'));
  }

  private function validateMeta(\PHPHtmlParser\Dom $parser, $key, $rules, &$messages = [])
  {

    foreach ($rules as $name => $rule) {
      if (!is_array($rule)) $rule = [
        'value' => $rule,
        'message' => null
      ];
      $contentValue = $this->getMetaContent($parser, $key);
      switch ($name) {
        case 'except':
          if ($contentValue !== $rule['value'])
            $messages[] = $this->makeErrorMessage($key, $rule['message'] ?? $key . 'が異なります（' . $contentValue . '）');
          break;
        case 'unique':
          if ($this->getMetaCount($parser, $key) > 1)
            $messages[] = $this->makeErrorMessage($key, $rule['message'] ?? $key . 'が複数あります');
          break;
        default:
      }
    }

  }

  /**
   * head内の検証
   *
   * @param Model\SiteMap $siteMap
   * @param Model\SiteMapPage $page
   * @param \PHPHtmlParser\Dom $parser
   * @return array
   */
  private function validateHead(\PHPHtmlParser\Dom $parser, Model\SiteMap $siteMap, Model\SiteMapPage $page)
  {
    $pageHead = new Model\PageHead;
    $messages = [];

    // title
    $pageHead->title = $parser->find('title')[0]->innerHtml;
    $title = $page->title_use_common ? $siteMap->title : $page->title;
    if ($title !== $pageHead->title) {
      $messages[] = $this->makeErrorMessage('title', 'titleが異なります（' . $pageHead->title . '）');
    }

    // charset
    $charset = $parser->find('meta[charset]')[0]->getAttribute('charset');
    if (!$charset && $content = $parser->find('meta[http-equiv="Content-Type"]')[0]->getAttribute('content')) {
      if (preg_match('charset=(\w+)($|;| )', $content, $matches)) {
        $charset = $matches[1];
      }
    }
    $pageHead->charset = $charset;
    $charset = $page->charset_use_common ? $siteMap->charset : $page->charset;
    if ($charset !== $pageHead->charset) {
      $messages[] = $this->makeErrorMessage('charset', 'charsetが異なります（' . $pageHead->charset . '）');
    }

    // keywords
    $this->validateMeta($parser, 'keywords', [
      'except' => $page->keywords_use_common ? $siteMap->keywords : $page->keywords,
      'unique' => true,
    ], $messages);

    // description
    $this->validateMeta($parser, 'description', [
      'except' => $page->description_use_common ? $siteMap->description : $page->description,
      'unique' => true,
    ], $messages);

    // og:image
    $this->validateMeta($parser, 'og:image', [
      'except' => $page->og_image_use_common ? $siteMap->og_image : $page->og_image,
      'unique' => true,
    ], $messages);

    // og:title
    $this->validateMeta($parser, 'og:title', [
      'except' => $page->og_title_use_common ? $siteMap->og_title : $page->og_title,
      'unique' => true,
    ], $messages);

    // og:description
    $this->validateMeta($parser, 'og:description', [
      'except' => $page->og_description_use_common ? $siteMap->og_description : $page->og_description,
      'unique' => true,
    ], $messages);

    // og:url
    $this->validateMeta($parser, 'og:url', [
      'except' => $page->og_url_use_common ? $siteMap->og_url : $page->og_url,
      'unique' => true,
    ], $messages);

    return $messages;
  }

  public function check()
  {
    $siteMap = Model\SiteMap::all()[0];
    $pages = Model\SiteMapPage::orderBy('path')->get();

    $validator = new \HtmlValidator\Validator;
    $parser = new \PHPHtmlParser\Dom;

    // history 作成
    $revision = intval(Model\CheckHistory::max('revision')) + 1;
    $history = new Model\CheckHistory([
      'revision' => $revision,
      'is_passed' => empty($messages),
    ]);
    $history->save();

    $hasError = false;
    foreach ($pages as $page) {
//      $page = new Model\SiteMapPage($postPage);

      $errorMessages = [];

      // parse DOM
      $content = file_get_contents(rtrim($siteMap->url_production, '/') . '/' . ltrim($page->path, '/'));
      $parser->load($content);

      // pageInfo取得
//      $pageInfo = new Model\PageInfo;
//      $pageInfo->url = $siteMap->url_production . $page->path;
//      $pageInfo->path = $page->path;
//      $pageInfo->h1 = $parser->find('h1')[0]->innerHtml;

      $errorMessages = array_merge($errorMessages, $this->validateHead($parser, $siteMap, $page));

      // W3C validation HTML
      // https://validator.nu/?doc=https://google.co.jp/&out=json
      try {
        /* @var \HtmlValidator\Response */
        $result = $validator->validate($content);
        if ($result instanceof \HtmlValidator\Response && $result->hasMessages()) {
          foreach ($result->getMessages() as /* @var \HtmlValidator\Message */ $message) {
            if (!in_array($message->getType(), ['error', 'warning'])) continue;
            $msg = new Model\ResultMessage;
            $msg->key = 'html';
            $msg->type = $message->getType();
            $msg->message = $message->getText();
            $errorMessages[] = $msg;
          }
        }
      } catch (ServerException $e) {
        $msg = new Model\ResultMessage;
        $msg->key = 'html';
        $msg->type = 'error';
        $msg->message = 'HTMLの解析に失敗しました';
        $errorMessages[] = $msg;
      }

      // TODO W3C validation CSS
      // TODO ESLint

      if (!empty($errorMessages)) {
        $hasError = true;
        foreach ($errorMessages as /* @var Model\ResultMessage */ $msg) {
          // TODO history_detail 作成
          $historyDetail = new Model\CheckHistoryDetail([
            'history_id' => $history->id,
            'page_id' => $page->id,
            'key' => $msg->key,
            'message' => $msg->message,
            'type' => $msg->type,
          ]);
          $historyDetail->save();
        }
      }
    }

    if ($hasError) {
      $history->is_passed = false;
      $history->save();
    }

    return redirect()->route('sitemap.index');
  }

  public function output()
  {
    $pages = Model\SiteMapPage::orderBy('path')->get();
    return view('sitemap.output', [
      'pages' => $this->makePagesHierarchy($pages)
    ]);
  }

  private function makePagesHierarchy($pages)
  {
    $data = [];

    $data = [
      [
        'title' => 'TOP',
        'path' => '/',
        'children' => [
          [
            'title' => '子供1',
            'path' => '/',
            'children' => []
          ],
          [
            'title' => '子供2',
            'path' => '/',
            'children' => [
              [
                'title' => '孫1',
                'path' => '/',
                'children' => []
              ],
              [
                'title' => '孫1',
                'path' => '/',
                'children' => []
              ]
            ]
          ],
          [
            'title' => '子供3',
            'path' => '/',
            'children' => [
              [
                'title' => '孫3-1',
                'path' => '/',
                'children' => []
              ]
            ]
          ],
          [
            'title' => '子供4',
            'path' => '/',
            'children' => []
          ]
        ]
      ]
    ];
    return $data;
  }
}
