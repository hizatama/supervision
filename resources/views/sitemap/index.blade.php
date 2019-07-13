@extends('layout')
@section('css')

@endsection
@section('header')

@endsection
@section('content')
  {{Form::open(['route'=>'sitemap.store', 'method' => 'post'])}}
  <div class="container">
    <h1>サイトマップ</h1>
    <section class="section section--url">
      <h2>共通設定</h2>

      <h3>URL</h3>
      <table class="table table--pages table--fluid">
        <tr>
          <th><label for="url_production">本番環境</label></th>
          <td>{{Form::text('sitemap[url_production]', $siteMap->url_production, ['id'=>'url_production', 'class' => 'form-control'])}}</td>
          <th><label for="url_staging">テスト環境</label></th>
          <td>{{Form::text('sitemap[url_staging]', $siteMap->url_staging, ['id'=>'url_staging', 'class' => 'form-control'])}}</td>
        </tr>
      </table>

      <h3>meta</h3>
      <table class="table table--pages table--fluid">
        <tr>
          <th><label for="keywords">charset</label></th>
          <td>{{Form::text('sitemap[charset]', $siteMap->charset, ['id'=>'charset', 'class' => 'form-control'])}}</td>
          <th><label for="keywords">favicon</label></th>
          <td>{{Form::text('sitemap[favicon]', $siteMap->favicon, ['id'=>'favicon', 'class' => 'form-control'])}}</td>
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
    </section>

    <h3>ページ一覧</h3>
    @if($messages)
      <ul class="alert alert-danger" role="alert">
      @foreach($messages as $msg)
        <li>page{{$msg->page_id}} {{$msg->key}} :: {{$msg->message}}</li>
      @endforeach
      </ul>
    @endif
    <table class="table table--pages">
      <thead>
      <tr>
        <th rowspan="2">ページタイトル</th>
        <th rowspan="2">パス</th>
        <th colspan="7">meta</th>
        <th rowspan="2">CHECK</th>
      </tr>
      <tr>
        <th>title</th>
        <th>keywords</th>
        <th>description</th>
        <th>og:title</th>
        <th>og:url</th>
        <th>og:image</th>
        <th>og:description</th>
      </tr>
      </thead>
      <tbody id="table_body">
      @foreach($pages as $idx => $page)
        <tr>
          <td>{{Form::hidden('pages['.$idx.'][id]', $page->id)}}{{Form::text('pages['.$idx.'][name]', $page->name, ['class' => 'form-control'])}}</td>
          <td>{{Form::text('pages['.$idx.'][path]', $page->path, ['class' => 'form-control'])}}</td>
          <td>
            {{Form::text('pages['.$idx.'][title]', $page->title, ['class' => 'form-control'])}}
            <label>{{Form::checkbox('pages['.$idx.'][title_use_common]', 1, $page->title_use_common, ['class' => 'use-common-checkbox'])}}共通設定を使用する</label>
          </td>
          <td>
            {{Form::text('pages['.$idx.'][keywords]', $page->keywords, ['class' => 'form-control custom-form-inline'])}}
            <label>{{Form::checkbox('pages['.$idx.'][keywords_use_common]', 1, $page->keywords_use_common, ['class' => 'use-common-checkbox'])}}共通設定を使用する</label>
          </td>
          <td>
            {{Form::text('pages['.$idx.'][description]', $page->description, ['class' => 'form-control custom-form-inline'])}}
            <label>{{Form::checkbox('pages['.$idx.'][description_use_common]', 1, $page->description_use_common, ['class' => 'use-common-checkbox'])}}共通設定を使用する</label>
          </td>
          <td>
            {{Form::text('pages['.$idx.'][og_title]', $page->og_title, ['class' => 'form-control'])}}
            <label>{{Form::checkbox('pages['.$idx.'][og_title_use_common]', 1, $page->og_title_use_common, ['class' => 'use-common-checkbox'])}}共通設定を使用する</label>
          </td>
          <td>
            {{Form::text('pages['.$idx.'][og_url]', $page->og_url, ['class' => 'form-control'])}}
            <label>{{Form::checkbox('pages['.$idx.'][og_url_use_common]', 1, $page->og_url_use_common, ['class' => 'use-common-checkbox'])}}共通設定を使用する</label>
          </td>
          <td>
            {{Form::text('pages['.$idx.'][og_image]', $page->og_image, ['class' => 'form-control'])}}
            <label>{{Form::checkbox('pages['.$idx.'][og_image_use_common]', 1, $page->og_image_use_common, ['class' => 'use-common-checkbox'])}}共通設定を使用する</label>
          </td>
          <td>
            {{Form::text('pages['.$idx.'][og_description]', $page->og_description, ['class' => 'form-control'])}}
            <label>{{Form::checkbox('pages['.$idx.'][og_description_use_common]', 1, $page->og_description_use_common, ['class' => 'use-common-checkbox'])}}共通設定を使用する</label>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <div class="text-center">
      <button type="button" id="add_row" class="btn btn-secondary">ページ追加</button>
    </div>
  </div>

  <div class="sticky-footer is-fixed">
    <div class="sticky-footer__inner">
      <div class="text-right">
        {{Form::submit('登録する', ['class'=>'btn btn-primary'])}}
      </div>
    </div>
  </div>
  {{Form::close()}}
@endsection
@section('scripts')
  <script>
    let lastIndex = parseInt('{{count($pages)}}', 10);

    const $addRow = document.getElementById('add_row');
    const $tableBody = document.getElementById('table_body');
    const template = `
      <td>{{Form::hidden('pages[?][id]', null)}}{{Form::text('pages[?][name]', null, ['class' => 'form-control'])}}</td>
          <td>{{Form::text('pages[?][path]', null, ['class' => 'form-control'])}}</td>
          <td>
            {{Form::text('pages[?][title]', null, ['class' => 'form-control'])}}
      <label>{{Form::checkbox('pages[?][title_use_common]', 1, false, ['class' => 'use-common-checkbox'])}}共通設定を使用する</label>
          </td>
          <td>
            {{Form::text('pages[?][keywords]', null, ['class' => 'form-control custom-form-inline'])}}
      <label>{{Form::checkbox('pages[?][keywords_use_common]', 1, true, ['class' => 'use-common-checkbox'])}}共通設定を使用する</label>
          </td>
          <td>
            {{Form::text('pages[?][description]', null, ['class' => 'form-control custom-form-inline'])}}
      <label>{{Form::checkbox('pages[?][description_use_common]', 1, false, ['class' => 'use-common-checkbox'])}}共通設定を使用する</label>
          </td>
          <td>
            {{Form::text('pages[?][og_title]', null, ['class' => 'form-control'])}}
      <label>{{Form::checkbox('pages[?][og_title_use_common]', 1, true, ['class' => 'use-common-checkbox'])}}共通設定を使用する</label>
          </td>
          <td>
            {{Form::text('pages[?][og_url]', null, ['class' => 'form-control'])}}
      <label>{{Form::checkbox('pages[?][og_url_use_common]', 1, true, ['class' => 'use-common-checkbox'])}}共通設定を使用する</label>
          </td>
          <td>
            {{Form::text('pages[?][og_image]', null, ['class' => 'form-control'])}}
      <label>{{Form::checkbox('pages[?][og_image_use_common]', 1, true, ['class' => 'use-common-checkbox'])}}共通設定を使用する</label>
          </td>
          <td>
            {{Form::text('pages[?][og_description]', null, ['class' => 'form-control'])}}
      <label>{{Form::checkbox('pages[?][og_description_use_common]', 1, true, ['class' => 'use-common-checkbox'])}}共通設定を使用する</label>
          </td>`;

    function addRow() {
      const $newRow = document.createElement('tr');
      $newRow.innerHTML = template.replace(/\?/g, lastIndex);
      $tableBody.appendChild($newRow);
      lastIndex++;

      const ne = new Event('resize');
      window.dispatchEvent(ne)
    }

    function applyCheckbox(check) {
      const el = check.parentElement.previousElementSibling;

      if(check.checked) {
        // 共通設定を使用する場合
        el.setAttribute('data-org-value', el.value);
        el.value = '共通設定を使用';
        el.disabled = true;
      } else {
        // 共通設定を使用しない場合
        el.value = el.getAttribute('data-org-value') || '';
        el.disabled = false;
      }
    }

    document.querySelectorAll('.use-common-checkbox').forEach((el)=>{
      if(el.checked) {
        applyCheckbox(el);
      }
    });

    // ページ追加ボタン
    $addRow.addEventListener('click', function (e) {
      e.preventDefault();
      addRow();
    });

    $tableBody.addEventListener('change', function (e) {
      if (!e.target.classList.contains('use-common-checkbox')
        || e.target.type !== 'checkbox') return;
      applyCheckbox(e.target);
    });

    $tableBody.addEventListener('keydown', function (e) {
      if (e.target.tagName !== 'INPUT' || e.target.type !== 'text') return;
      const matches = /^pages\[(\d+)]\[(\w+)]$/.exec(e.target.name);
      if (matches) {
        const currentIndex = parseInt(matches[1], 10);
        const currentKey = matches[2];
        let nextInput;
        if (e.key === 'ArrowUp') {
          nextInput = document.querySelector('[name="pages[' + (Math.max(0, currentIndex - 1)) + '][' + currentKey + ']"]');

          // 最後の行から移動した時、空行なら削除する
          const lastRow = $tableBody.querySelector('tr:last-child');
          const currentRow = e.target.parentElement.parentElement;
          if(lastRow === currentRow) {
            const rowInputs = currentRow.querySelectorAll('input[type="text"]');
            let isEmptyRow = true;
            rowInputs.forEach((el)=>{
              if(el.value.length > 0) {
                isEmptyRow = false;
              }
            });
            if(isEmptyRow) {
              currentRow.remove();
              lastIndex--;
            }
          }
        } else if (e.key === 'ArrowDown') {
          nextInput = document.querySelector('[name="pages[' + (Math.min(lastIndex, currentIndex + 1)) + '][' + currentKey + ']"]');
          if (!nextInput) {
            addRow();
            nextInput = document.querySelector('[name="pages[' + (Math.min(lastIndex, currentIndex + 1)) + '][' + currentKey + ']"]');
          }
        } else if (e.key === 'ArrowLeft' && e.target.selectionStart === 0 && e.target.selectionEnd === 0) {
          nextInput = e.target.parentNode.previousElementSibling;
          if (nextInput) {
            nextInput = nextInput.querySelector('input[type="text"]');
            nextInput.setSelectionRange(-1, -1);
          }
        } else if (e.key === 'ArrowRight' && e.target.selectionStart === e.target.value.length && e.target.selectionEnd === e.target.value.length) {
          nextInput = e.target.parentNode.nextElementSibling;
          if (nextInput) {
            nextInput = nextInput.querySelector('input[type="text"]');
            nextInput.setSelectionRange(0, 0);
          }
        }
        if (nextInput) nextInput.focus();
      }
    });
  </script>
@endsection
