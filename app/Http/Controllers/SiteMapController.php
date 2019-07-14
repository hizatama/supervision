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

    $checkHistories = [];
    if($history && !$history->is_passed) {
      $checkHistories = Model\CheckHistoryDetail::select()->where('history_id', $history->id)->get();
    }

    $data = [
      'siteMap' => Model\SiteMap::all()[0],
      'pages' => Model\SiteMapPage::all(),
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
    $postSiteMap = Request::all('sitemap');
    $postPages = Request::all('pages');

    $msg = new Model\ResultMessage;
    $msg->key = 'system';

    try {
      DB::beginTransaction();
      $siteMap = Model\SiteMap::all()->first();
      if($siteMap instanceof Model\SiteMap) {
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
          ], $postPage);

          if($postPage['id'] === 'new') {
            unset($postPage['id']);
            $page = new Model\SiteMapPage($postPage);
            $page->save();
          } else {
            $page = Model\SiteMapPage::find((int)$postPage['id']);
            $page->update($postPage);
            $page->save();
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

    return $this->viewIndex([
      'flashMessages' => [$msg]
    ]);
  }

  protected function makeErrorMessage($key, $message)
  {
    $msg = new Model\ResultMessage;
    $msg->key = $key;
    $msg->type = 'error';
    $msg->message = $message;
    return $msg;
  }

  public function check()
  {
    // TODO 全てのページをクロールする
    $postSiteMap = Request::all('sitemap');
    $postPages = Request::all('pages');
    $siteMap = new Model\SiteMap($postSiteMap['sitemap']);
    $validator = new \HtmlValidator\Validator;
    $parser = new \PHPHtmlParser\Dom;

    // history 作成
    $revision = intval(Model\CheckHistory::max('revision')) + 1;
    $history = new Model\CheckHistory([
      'revision' => $revision,
      'is_passed' => empty($messages),
    ]);
    $history->save();

    foreach ($postPages['pages'] as $postPage) {
      $page = new Model\SiteMapPage($postPage);

      $content = file_get_contents($siteMap->url_production . $page->path);

      $messages = [];

      // parse DOM
      $parser->load($content);

      // pageInfo取得
      $pageInfo = new Model\PageInfo;
      $pageInfo->url = $siteMap->url_production . $page->path;
      $pageInfo->path = $page->path;
      $pageInfo->h1 = $parser->find('h1')[0]->innerHtml;

      // meta取得
      $pageHead = new Model\PageHead;
      $pageHead->title = $parser->find('title')[0]->innerHtml;
      $charset = $parser->find('meta[charset]')[0]->getAttribute('charset');
      if (!$charset && $content = $parser->find('meta[http-equiv="Content-Type"]')[0]->getAttribute('content')) {
        if (preg_match('charset=(\w+)($|;| )', $content, $matches)) {
          $charset = $matches[1];
        }
      }
      $pageHead->charset = $charset;
      $pageHead->keywords = $parser->find('meta[name="keywords"]')[0]->getAttribute('content');
      $pageHead->description = $parser->find('meta[name="description"]')[0]->getAttribute('content');
      $pageHead->canonical = $parser->find('meta[name="canonical"]')[0]->getAttribute('content');
      $pageHead->og_image = $parser->find('meta[name="og:image"]')[0]->getAttribute('content');
      $pageHead->og_title = $parser->find('meta[name="og:title"]')[0]->getAttribute('content');
      $pageHead->og_description = $parser->find('meta[name="og:description"]')[0]->getAttribute('content');
      $pageHead->og_url = $parser->find('meta[name="og:url"]')[0]->getAttribute('content');


      if ($siteMap->charset !== $pageHead->charset) {
        $messages[] = $this->makeErrorMessage('charset', 'charsetが異なります');
      }

      $title = $page->title_use_common ? $siteMap->title : $page->title;
      if ($title !== $pageHead->title) {
        $messages[] = $this->makeErrorMessage('title', 'titleが異なります');
      }

      $keywords = $page->keywords_use_common ? $siteMap->keywords : $page->keywords;
      if ($keywords !== $pageHead->keywords) {
        $messages[] = $this->makeErrorMessage('keywords', 'keywordsが異なります');
      }

      $description = $page->description_use_common ? $siteMap->description : $page->description;
      if ($description !== $pageHead->description) {
        $messages[] = $this->makeErrorMessage('description', 'descriptionが異なります');
      }
//      if($page->canonical !== $pageHead->canonical) {
//            $messages[] = $this->makeErrorMessage('canonical', 'canonicalが異なります');
//      }
      $og_image = $page->og_image_use_common ? $siteMap->og_image : $page->og_image;
      if ($og_image !== $pageHead->og_image) {
        $messages[] = $this->makeErrorMessage('og_image', 'og:imageが異なります');
      }
      $og_description = $page->og_description_use_common ? $siteMap->og_description : $page->og_description;
      if ($og_description !== $pageHead->og_description) {
        $messages[] = $this->makeErrorMessage('og_description', 'og:descriptionが異なります');
      }


      // W3C validation HTML
      // https://validator.nu/?doc=https://google.co.jp/&out=json
      try {
        /* @var \HtmlValidator\Response */
        $result = $validator->validate($content);
        if ($result instanceof \HtmlValidator\Response && $result->hasMessages()) {
          foreach ($result->getMessages() as /* @var \HtmlValidator\Message */$message) {
            if (!in_array($message->getType(), ['error', 'warning'])) continue;
            $msg = new Model\ResultMessage;
            $msg->key = 'html';
            $msg->type = $message->getType();
            $msg->message = $message->getText();
            $messages[] = $msg;
          }
        }
      } catch (ServerException $e) {
        $msg = new Model\ResultMessage;
        $msg->key = 'html';
        $msg->type = 'error';
        $msg->message = 'HTMLの解析に失敗しました';
        $messages[] = $msg;
      }

      // TODO W3C validation CSS
      // TODO ESLint

      if(!empty($messages)) {
        $hasError = true;
        foreach ($messages as /* @var Model\ResultMessage */ $msg) {
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

    if($hasError) {
      $history->update([
        'is_passed' => false
      ]);
    }

    return $this->viewIndex();
  }
}
