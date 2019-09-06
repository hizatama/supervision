@extends('layout')
@section('css')

@endsection
@section('header')

@endsection
@section('content')
  {{Form::open(['route'=>'sitemap.store', 'method' => 'post'])}}
  <div class="container-fluid">
    @foreach($flashMessages as $flash)
      @if($flash->key === 'system')
        <div class="alert alert-{{$flash->type}} alert-dismissible fade show" role="alert">
          {{$flash->message}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
    @endforeach

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings">共通設定</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" id="pages-tab" data-toggle="tab" href="#pages">ページ一覧</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="output-tab" data-toggle="tab" href="#output">サイトマップ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="feature-tab" data-toggle="tab" href="#feature">今後追加予定機能</a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane main-tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
        <h3>URL</h3>
        <table class="table table--headers table--fluid">
          <tr>
            <th><label for="url_production">本番環境</label></th>
            <td>
              {{Form::text('sitemap[url_production]', $siteMap->url_production, ['id'=>'url_production', 'class' => 'form-control'])}}
              <button type="button" class="btn btn-link" id="open_production_page">open</button>
            </td>
            <th><label for="url_staging">テスト環境</label></th>
            <td>
              {{Form::text('sitemap[url_staging]', $siteMap->url_staging, ['id'=>'url_staging', 'class' => 'form-control'])}}
              <button type="button" class="btn btn-link" id="open_staging_page">open</button>
            </td>
          </tr>
        </table>

        <h3>meta</h3>
        <table class="table table--headers table--fluid">
          <tr>
            <th><label for="keywords">charset</label></th>
            <td>{{Form::text('sitemap[charset]', $siteMap->charset, ['id'=>'charset', 'class' => 'form-control'])}}</td>
            <th><label for="keywords">favicon</label></th>
            <td>{{Form::text('sitemap[favicon]', $siteMap->favicon, ['id'=>'favicon', 'class' => 'form-control'])}}</td>
          </tr>
          <tr>
            <th><label for="keywords">title</label></th>
            <td>{{Form::text('sitemap[title]', $siteMap->title, ['id'=>'title', 'class' => 'form-control'])}}</td>
          </tr>
          {{--        <tr>--}}
          {{--          <th><label for="title_prefix">title prefix</label></th>--}}
          {{--          <td>{{Form::text('sitemap[title_prefix]', $siteMap->title_prefix, ['id'=>'title_prefix', 'class' => 'form-control'])}}</td>--}}
          {{--          <th><label for="title_suffix">title suffix</label></th>--}}
          {{--          <td>{{Form::text('sitemap[title_suffix]', $siteMap->title_suffix, ['id'=>'title_suffix', 'class' => 'form-control'])}}</td>--}}
          {{--        </tr>--}}
          <tr>
            <th><label for="keywords">keywords</label></th>
            <td>{{Form::text('sitemap[keywords]', $siteMap->keywords, ['id'=>'keywords', 'class' => 'form-control'])}}</td>
            <th><label for="description">description</label></th>
            <td>{{Form::text('sitemap[description]', $siteMap->description, ['id'=>'description', 'class' => 'form-control'])}}</td>
          </tr>
          <tr>
            <th><label for="og_image">og:url</label></th>
            <td>{{Form::text('sitemap[og_url]', $siteMap->og_url, ['id'=>'og_url', 'class' => 'form-control'])}}</td>
            <th><label for="og_image">og:title</label></th>
            <td>{{Form::text('sitemap[og_title]', $siteMap->og_title, ['id'=>'og_title', 'class' => 'form-control'])}}</td>
          </tr>
          <tr>
            <th><label for="og_image">og:description</label></th>
            <td>{{Form::text('sitemap[og_description]', $siteMap->og_description, ['id'=>'og_description', 'class' => 'form-control'])}}</td>
            <th><label for="og_image">og:image(絶対パス)</label></th>
            <td>{{Form::text('sitemap[og_image]', $siteMap->og_image, ['id'=>'og_image', 'class' => 'form-control'])}}</td>
          </tr>
        </table>
      </div>
      <div class="tab-pane main-tab-pane fade show active" id="pages" role="tabpanel" aria-labelledby="pages-tab">
        @if($isPassed)
          <div class="alert alert-success" role="alert">エラーはありません</div>
        @endif
        <div class="table--pages-wrapper">

          <table class="table table--pages table-fixed" id="table-pages">
            <thead>
            <tr>
              <th rowspan="2"></th>
              <th rowspan="2">ページタイトル</th>
              <th rowspan="2">パス</th>
              <th colspan="9">meta</th>
            </tr>
            <tr>
              <th>title</th>
              <th>keywords</th>
              <th>description</th>
              <th>og:title</th>
              <th>og:url</th>
              <th>og:image</th>
              <th>og:description</th>
              <th>favicon</th>
              <th>charset</th>
            </tr>
            </thead>
            <tbody id="table_body">
            @foreach($pages as $idx => $page)
              <tr>
                <td class="cell-status">
                  @if(count($page->errors))
                    <div class="alert alert-danger text-center">NG</div>
                  @endif
                </td>
                <td>{{Form::hidden('pages['.$idx.'][id]', $page->id)}}{{Form::text('pages['.$idx.'][name]', $page->name, ['class' => 'form-control', 'required' => 'required'])}}</td>
                <td class="cell-path">{{Form::text('pages['.$idx.'][path]', $page->path, ['class' => 'form-control'])}}</td>
                <td>
                  {{Form::checkbox('pages['.$idx.'][title_use_common]', 1, $page->title_use_common, ['class' => 'use-common-checkbox'])}}
                  {{Form::text('pages['.$idx.'][title]', $page->title, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#title'])}}
                  @if(isset($page->errors['title']))
                    <ul class="alert alert-danger" role="alert">
                      @foreach($page->errors['title'] as $historyDetail)
                        <li>{{$historyDetail->message}}</li>
                      @endforeach
                    </ul>
                  @endif
                </td>
                <td>
                  {{Form::checkbox('pages['.$idx.'][keywords_use_common]', 1, $page->keywords_use_common, ['class' => 'use-common-checkbox'])}}
                  {{Form::text('pages['.$idx.'][keywords]', $page->keywords, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#keywords'])}}
                  @if(isset($page->errors['keywords']))
                    <ul class="alert alert-danger" role="alert">
                      @foreach($page->errors['keywords'] as $historyDetail)
                        <li>{{$historyDetail->message}}</li>
                      @endforeach
                    </ul>
                  @endif
                </td>
                <td>
                  {{Form::checkbox('pages['.$idx.'][description_use_common]', 1, $page->description_use_common, ['class' => 'use-common-checkbox'])}}
                  {{Form::text('pages['.$idx.'][description]', $page->description, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#description'])}}
                  @if(isset($page->errors['description']))
                    <ul class="alert alert-danger" role="alert">
                      @foreach($page->errors['description'] as $historyDetail)
                        <li>{{$historyDetail->message}}</li>
                      @endforeach
                    </ul>
                  @endif
                </td>
                <td>
                  {{Form::checkbox('pages['.$idx.'][og_title_use_common]', 1, $page->og_title_use_common, ['class' => 'use-common-checkbox'])}}
                  {{Form::text('pages['.$idx.'][og_title]', $page->og_title, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#og_title'])}}
                  @if(isset($page->errors['og:title']))
                    <ul class="alert alert-danger" role="alert">
                      @foreach($page->errors['og:title'] as $historyDetail)
                        <li>{{$historyDetail->message}}</li>
                      @endforeach
                    </ul>
                  @endif
                </td>
                <td>
                  {{Form::checkbox('pages['.$idx.'][og_url_use_common]', 1, $page->og_url_use_common, ['class' => 'use-common-checkbox'])}}
                  {{Form::text('pages['.$idx.'][og_url]', $page->og_url, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#og_url'])}}
                  @if(isset($page->errors['og:url']))
                    <ul class="alert alert-danger" role="alert">
                      @foreach($page->errors['og:url'] as $historyDetail)
                        <li>{{$historyDetail->message}}</li>
                      @endforeach
                    </ul>
                  @endif
                </td>
                <td>
                  {{Form::checkbox('pages['.$idx.'][og_image_use_common]', 1, $page->og_image_use_common, ['class' => 'use-common-checkbox'])}}
                  {{Form::text('pages['.$idx.'][og_image]', $page->og_image, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#og_image'])}}
                  @if(isset($page->errors['og:image']))
                    <ul class="alert alert-danger" role="alert">
                      @foreach($page->errors['og:image'] as $historyDetail)
                        <li>{{$historyDetail->message}}</li>
                      @endforeach
                    </ul>
                  @endif
                </td>
                <td>
                  {{Form::checkbox('pages['.$idx.'][og_description_use_common]', 1, $page->og_description_use_common, ['class' => 'use-common-checkbox'])}}
                  {{Form::text('pages['.$idx.'][og_description]', $page->og_description, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#og_description'])}}
                  @if(isset($page->errors['og:description']))
                    <ul class="alert alert-danger" role="alert">
                      @foreach($page->errors['og:description'] as $historyDetail)
                        <li>{{$historyDetail->message}}</li>
                      @endforeach
                    </ul>
                  @endif
                </td>
                <td>
                  {{Form::checkbox('pages['.$idx.'][favicon_use_common]', 1, $page->favicon_use_common, ['class' => 'use-common-checkbox'])}}
                  {{Form::text('pages['.$idx.'][favicon]', $page->favicon, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#favicon'])}}
                  @if(isset($page->errors['favicon']))
                    <ul class="alert alert-danger" role="alert">
                      @foreach($page->errors['favicon'] as $historyDetail)
                        <li>{{$historyDetail->message}}</li>
                      @endforeach
                    </ul>
                  @endif
                </td>
                <td>
                  {{Form::checkbox('pages['.$idx.'][charset_use_common]', 1, $page->charset_use_common, ['class' => 'use-common-checkbox'])}}
                  {{Form::text('pages['.$idx.'][charset]', $page->charset, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#charset'])}}
                  @if(isset($page->errors['charset']))
                    <ul class="alert alert-danger" role="alert">
                      @foreach($page->errors['charset'] as $historyDetail)
                        <li>{{$historyDetail->message}}</li>
                      @endforeach
                    </ul>
                  @endif
                </td>
              </tr>
              <tr>
                <td></td>
                <td colspan="100">
                  @if(isset($page->errors['html']))
                    <div class="p-2">
                      <h6>W3C HTML Validation</h6>
                      <ul class="alert alert-danger" role="alert">
                      @foreach($page->errors['html'] as $historyDetail)
                        <li>{{$historyDetail->message}}</li>
                      @endforeach
                      </ul>
                    </div>
                  @endif
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <div class="text-center">
          <button type="button" id="add_row" class="btn btn-secondary">ページ追加</button>
        </div>
      </div>
      <div class="tab-pane main-tab-pane fade" id="output" role="tabpanel" aria-labelledby="output-tab">
        <div class="container">

          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" id="horizontal-tab" data-toggle="tab" href="#horizontal">横出力</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="vertical-tab" data-toggle="tab" href="#vertical">縦出力</a>
            </li>
          </ul>

          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="horizontal" role="tabpanel" aria-labelledby="horizontal-tab">
              <ul class="tree tree-horizontal root">
                @include('sitemap.output-tree', ['pages' => $pageHierarchy])
              </ul>
            </div>
            <div class="tab-pane fade" id="vertical" role="tabpanel" aria-labelledby="vertical-tab">
              <ul class="tree tree-vertical root">
                @include('sitemap.output-tree', ['pages' => $pageHierarchy])
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane main-tab-pane fade" id="feature" role="tabpanel" aria-labelledby="feature-tab">
        <ul>
          <li>
            操作性の向上
            <ul>
              <li>ExcelからのTSVコピペに対応（複数行・複数列）</li>
            </ul>
          </li>
          <li>
            案件進行管理機能
            <ul>
              <li>サイトマップ出力機能(現在ダミー出力)</li>
              <li>サイトマップPDF出力機能</li>
              <li>ワイヤーフレーム作成機能</li>
              <li>ワイヤーフレーム・デザインデータのアップロード機能</li>
              <li>ワイヤーフレーム・デザインデータへのコメント機能</li>
              <li>ページごとの進捗管理（WBSっぽい何か）</li>
              <li>meta等のHTML出力機能</li>
            </ul>
          </li>
          <li>
            テスト機能
            <ul>
              <li>キャプチャベースのリグレッションテスト</li>
              <li>SeleniumGridによる各ブラウザテスト</li>
              <li>Prettier等での書き方指摘(HTML/CSS/JS)</li>
              <li>スピードテスト</li>
              <li>W3C CSS Validation</li>
              <li>パス記述方法（相対/ルート相対/絶対）チェック</li>
              <li>禁止用語チェック</li>
              <li>表記揺れチェック</li>
            </ul>
          </li>
          <li>
            サイトマップ機能
            <ul>
              <li>サイトマップからディレクトリマップの作成</li>
              <li>ページにアイコン追加</li>
              <li>複数ページへの対応</li>
              <li>sitemap.xmlの作成</li>
            </ul>
          </li>
          <li>
            サービス後悔するための機能追加
            <ul>
              <li>ユーザー管理機能(外部ログイン前提)</li>
              <li>外部公開用のURL生成機能</li>
              <li>リポジトリ連携(CI/CD)</li>
            </ul>
          </li>

        </ul>
      </div>
    </div>

  </div>

  <div class="sticky-footer is-fixed">
    <div class="sticky-footer__inner">
      <div class="text-right">
        {{Form::button('ページチェックを実行', ['class' => 'btn btn-secondary exec-check-page'])}}
        {{Form::submit('登録する', ['class'=>'btn btn-primary'])}}
      </div>
    </div>
  </div>
  {{Form::close()}}

  {{Form::open(['route'=>'sitemap.check', 'method' => 'get', 'id' => 'check_page_form'])}}
  {{Form::close()}}

  {{Form::open(['route'=>'sitemap.output', 'method' => 'get', 'id' => 'sitemap_form', 'target' => '_blank'])}}
  {{Form::close()}}
@endsection
@section('scripts')
  <script>
    let lastIndex = parseInt('{{count($pages)}}', 10);

    const $settings = document.getElementById('settings');
    const $addRow = document.getElementById('add_row');
    const $tableBody = document.getElementById('table_body');
    const template = `
      <td class="cell-status"><div class="alert alert-info text-center">New</div></td>
      <td>{{Form::hidden('pages[?][id]', 'new')}}{{Form::text('pages[?][name]', null, ['class' => 'form-control', 'required' => 'required'])}}</td>
          <td class="cell-path">{{Form::text('pages[?][path]', null, ['class' => 'form-control'])}}</td>
          <td>
            {{Form::checkbox('pages[?][title_use_common]', 1, false, ['class' => 'use-common-checkbox'])}}
            {{Form::text('pages[?][title]', null, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#title'])}}
          </td>
          <td>
            {{Form::checkbox('pages[?][keywords_use_common]', 1, true, ['class' => 'use-common-checkbox'])}}
            {{Form::text('pages[?][keywords]', null, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#keywords'])}}
          </td>
          <td>
            {{Form::checkbox('pages[?][description_use_common]', 1, false, ['class' => 'use-common-checkbox'])}}
            {{Form::text('pages[?][description]', null, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#description'])}}
          </td>
          <td>
            {{Form::checkbox('pages[?][og_title_use_common]', 1, true, ['class' => 'use-common-checkbox'])}}
            {{Form::text('pages[?][og_title]', null, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#og_title'])}}
          </td>
          <td>
            {{Form::checkbox('pages[?][og_url_use_common]', 1, true, ['class' => 'use-common-checkbox'])}}
            {{Form::text('pages[?][og_url]', null, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#og_url'])}}
          </td>
          <td>
            {{Form::checkbox('pages[?][og_image_use_common]', 1, true, ['class' => 'use-common-checkbox'])}}
            {{Form::text('pages[?][og_image]', null, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#og_image'])}}
          </td>
          <td>
            {{Form::checkbox('pages[?][og_description_use_common]', 1, true, ['class' => 'use-common-checkbox'])}}
            {{Form::text('pages[?][og_description]', null, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#og_description'])}}
          </td>
          <td>
            {{Form::checkbox('pages[?][favicon_use_common]', 1, true, ['class' => 'use-common-checkbox'])}}
            {{Form::text('pages[?][favicon]', null, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#favicon'])}}
          </td>
          <td>
            {{Form::checkbox('pages[?][charset_use_common]', 1, true, ['class' => 'use-common-checkbox'])}}
            {{Form::text('pages[?][charset]', null, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#charset'])}}
          </td>
          `;

    function addRow() {
      const $newRow = document.createElement('tr');
      $newRow.innerHTML = template.replace(/\?/g, lastIndex);
      $tableBody.appendChild($newRow);
      lastIndex++;

      $newRow.querySelectorAll('.use-common-checkbox').forEach((el)=>{
        if(el.checked) {
          applyCheckbox(el);
        }
      });

      const ne = new Event('resize');
      window.dispatchEvent(ne);

      return $newRow;
    }

    function applyCheckbox(check) {
      const el = check.nextElementSibling;

      if(check.checked) {
        // 共通設定を使用する場合
        el.setAttribute('data-org-value', el.value);
        const commonElement = document.querySelector(el.getAttribute('data-common-selector'));
        el.value = commonElement ? commonElement.value : '共通設定を使用';

        el.disabled = true;
      } else {
        // 共通設定を使用しない場合
        el.value = el.getAttribute('data-org-value') || '';
        el.disabled = false;
      }
    }

    function getLeftInput(el) {
      let nextInput = el.parentNode.previousElementSibling;
      if (nextInput) {
        nextInput = nextInput.querySelector('input[type="text"]');
        if(nextInput)
          return nextInput.disabled ? nextInput.previousElementSibling : nextInput;
      }
      return null;
    }

    function getRightInput(el) {
      let nextInput = el.parentNode.nextElementSibling;
      if (nextInput) {
        nextInput = nextInput.querySelector('input[type="text"]');
        if(nextInput)
          return nextInput.disabled ? nextInput.previousElementSibling : nextInput;
      }
      return null;
    }

    function getTopInput(currentIndex, currentKey) {
      if(currentIndex < 0) return null;
      const currentInput = document.querySelector('[name="pages[' + (Math.max(0, currentIndex)) + '][' + currentKey + ']"]');
      const nextInput = document.querySelector('[name="pages[' + (Math.max(0, currentIndex - 1)) + '][' + currentKey + ']"]');
      if(nextInput) {
        return nextInput.disabled ? nextInput.previousElementSibling : nextInput;
      }
      return null;
    }

    function getBottomInput(currentIndex, currentKey) {
      const currentInput = document.querySelector('[name="pages[' + (Math.min(lastIndex, currentIndex)) + '][' + currentKey + ']"]');
      const nextInput = document.querySelector('[name="pages[' + (Math.min(lastIndex, currentIndex + 1)) + '][' + currentKey + ']"]');
      if(nextInput) {
        return nextInput.disabled ?  nextInput.previousElementSibling : nextInput;
      }
      return null;
    }

    function isEmptyRow(row) {
      const rowInputs = row.querySelectorAll('input[type="text"]');
      let isEmptyRow = true;
      rowInputs.forEach((el)=>{
        if(!el.disabled && el.value.length > 0) {
          isEmptyRow = false;
        }
      });
      return isEmptyRow;
    }

    document.querySelectorAll('.use-common-checkbox').forEach((el)=>{
      if(el.checked) {
        applyCheckbox(el);
      }
    });

    // ページ追加ボタン
    $addRow.addEventListener('click', function (e) {
      e.preventDefault();
      $addedRow = addRow();
      $addedRow.querySelector('input[type="text"]').focus();
    });

    $tableBody.addEventListener('change', function (e) {
      if (!e.target.classList.contains('use-common-checkbox')
        || e.target.type !== 'checkbox') return;
      applyCheckbox(e.target);
    });

    $settings.addEventListener('change', function (e) {
      document.querySelectorAll('.use-common-checkbox').forEach((el)=>{
        if(el.checked) {
          applyCheckbox(el);
        }
      });
    });

    $tableBody.addEventListener('keydown', function (e) {
      if (e.target.tagName !== 'INPUT') return;
      const matches = /^pages\[(\d+)]\[(\w+)]$/.exec(e.target.name);
      if (matches) {
        const currentIndex = parseInt(matches[1], 10);
        const currentKey = matches[2];
        let nextInput;
        if (e.key === 'ArrowUp') {
          nextInput = getTopInput(currentIndex, currentKey);

          // 最後の行から移動した時、空行なら削除する
          const lastRow = $tableBody.querySelector('tr:last-child');
          const currentRow = e.target.parentElement.parentElement;
          if(lastRow === currentRow) {
            if(isEmptyRow(currentRow)) {
              currentRow.remove();
              lastIndex--;
            }
          }
        } else if (e.key === 'ArrowDown') {
          nextInput = getBottomInput(currentIndex, currentKey);
          if (!nextInput) {
            addRow();
            nextInput = getBottomInput(currentIndex, currentKey);
          }
        } else if (e.key === 'ArrowLeft' &&
          (e.target.type === 'checkbox' ||
            (e.target.type === 'text' && e.target.selectionStart === 0 && e.target.selectionEnd === 0))) {
          nextInput = getLeftInput(e.target);
          if (nextInput && nextInput.type === 'text') {
            setTimeout(()=>{
              nextInput.setSelectionRange(-1, -1);
            }, 10);
          }
        } else if (e.key === 'ArrowRight' &&
          (e.target.type === 'checkbox' ||
            (e.target.type === 'text' && e.target.selectionStart === e.target.value.length && e.target.selectionEnd === e.target.value.length))) {
          nextInput = getRightInput(e.target);
          if (nextInput && nextInput.type === 'text') {
            setTimeout(()=>{
              nextInput.setSelectionRange(0, 0);
            }, 10);
          }
        }
        if (nextInput) {
          e.preventDefault();
          nextInput.focus();
        }
      }
    });

    document.addEventListener('DOMContentLoaded', function(){
      $('#table-pages').floatThead({
        position: 'fixed',
        responsiveContainer: function($table){
          return $table.closest('.table--pages-wrapper');
        }
      });
    });

    document.querySelector('.exec-check-page').addEventListener('click', function(e){
      e.preventDefault();
      if(confirm('入力されたデータは保存されません。\nページチェック実行前に保存してください。')) {
        document.getElementById('check_page_form').submit();
      }
    });

    document.getElementById('open_production_page').addEventListener('click', function(e){
      e.preventDefault();
      window.open(document.getElementById('url_production').value, '_blank');
    });

    document.getElementById('open_staging_page').addEventListener('click', function(e){
      e.preventDefault();
      window.open(document.getElementById('url_staging').value, '_blank');
    });

  </script>
@endsection
