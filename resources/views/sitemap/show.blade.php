@extends('layout')
@section('css')

@endsection
@section('header')

@endsection
@section('content')
  {{Form::open(['route'=>'sitemap.store', 'method' => 'post'])}}
  {{Form::hidden('key', $siteMap->key)}}
  <div class="container-fluid">
    @foreach($flashMessages as $flash)
      @if($flash->key === 'system')
        <div class="alert flush-message alert-{{$flash->type}} alert-dismissible fade show" role="alert">
          {{$flash->message}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
    @endforeach

    <div class="head bg-light">
        <h2 class="h2 head-site-name">{{$siteMap->name}}</h2>
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" id="hearing-tab" data-toggle="tab" href="#hearing">ヒアリングシート</a>
          </li>
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
    </div>
    <div class="tab-content">
      <div class="tab-pane main-tab-pane fade" id="hearing" role="tabpanel" aria-labelledby="hearing-tab">
          @include('sitemap.tab-hearing')
      </div>
      <div class="tab-pane main-tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
          @include('sitemap.tab-settings')
      </div>
      <div class="tab-pane main-tab-pane fade show active" id="pages" role="tabpanel" aria-labelledby="pages-tab">
          @include('sitemap.tab-pages')
      </div>
      <div class="tab-pane main-tab-pane fade" id="output" role="tabpanel" aria-labelledby="output-tab">
          @include('sitemap.tab-output')
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

  {{Form::open(['url'=>route('sitemap.check', ['key' => $siteMap->key]), 'method' => 'get', 'id' => 'check_page_form'])}}
  {{Form::close()}}

  {{Form::open(['url'=>route('sitemap.output'), 'method' => 'get', 'id' => 'sitemap_form', 'target' => '_blank'])}}
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

    // document.getElementById('open_staging_page').addEventListener('click', function(e){
    //   e.preventDefault();
    //   window.open(document.getElementById('url_staging').value, '_blank');
    // });
  </script>
@endsection
