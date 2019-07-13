<?php

namespace App\Http\Controllers;

use App\Model;
use HtmlValidator\Exception\ServerException;
use Illuminate\Support\Facades\Request;

class SiteMapController extends Controller
{
  public function __construct()
  {
  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  private function viewIndex()
  {
    $data = [
      'siteMap' => Model\SiteMap::all()[0],
      'pages' => Model\SiteMapPage::all()
    ];

    return view('sitemap.index', $data);
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
    dump(Request::all());
    return $this->viewIndex();
  }

  public function check()
  {
    // TODO 全てのページをクロールする
    $pages = [];
    $validator = new \HtmlValidator\Validator;
    $parser = new \PHPHtmlParser\Dom;
    foreach ($pages as /* @var Model\SiteMapPage */ $page) {
      $errors = [];
      // TODO parse DOM
      $parser->loadFromUrl($page->url);

      // TODO pageInfo取得
      $pageInfo = new Model\PageInfo();
      $pageInfo->url = '';
      $pageInfo->path = '';
      $pageInfo->h1 = '';

      // TODO meta取得
      $pageHead = new Model\PageHead();
      $pageHead->title = '';
      $pageHead->charset = '';
      $pageHead->keywords = '';
      $pageHead->description = '';
      $pageHead->canonical = '';
      $pageHead->ogImage = '';
      $pageHead->ogTitle = '';
      $pageHead->ogUrl = '';

      // TODO W3C validation HTML
      // https://validator.nu/?doc=https://google.co.jp/&out=json
      /* @var \HtmlValidator\Response */
      try {
        $result = $validator->validateUrl($pageInfo->url);
        if ($result instanceof \HtmlValidator\Response && $result->hasMessages()) {
          foreach ($result->getMessages() as $error) {
            $msg = new Model\CheckResultMessage();
            $msg->key = 'html';
            $msg->type = $error->type;
            $msg->message = $error->message;
            $errors[] = $msg;
          }
        }
      } catch (ServerException $e) {
        $msg = new Model\CheckResultMessage();
        $msg->key = 'html';
        $msg->type = 'error';
        $msg->message = 'HTMLの解析に失敗しました';
        $errors[] = $msg;
      }

      // TODO W3C validation CSS
      // TODO ESLint

      // TODO history 作成
      $history = new Model\CheckHistory();
      $history->revision = 1;
      $history->path = $pageInfo->path;
      $history->isValid = empty($errors);

      foreach ($errors as /* @var Model\CheckResultMessage */ $error) {
        // TODO history_detail 作成
        $historyDetail = new Model\CheckHistoryDetail();
        $historyDetail->historyId = $history->id;
        $historyDetail->key = $error->key;
        $historyDetail->message = $error->message;
        $historyDetail->type = $error->type;
      }
    }
    return $this->viewIndex();
  }
}
