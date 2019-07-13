@extends('layout')
@section('css')

@endsection
@section('header')

@endsection
@section('content')
  <h1>サイトマップ</h1>

  {{Form::open(['route'=>'sitemap.store', 'method' => 'post'])}}
  <section class="section section--url">
    <h2>共通設定</h2>

    <h3>URL</h3>
    <table class="table table--fluid">
      <tr>
        <th><label for="base_url_production">本番環境</label></th>
        <td>{{Form::text('base_url_production', $siteMap->url_production, ['id'=>'base_url_production', 'class' => 'form-control'])}}</td>
        <th><label for="base_url_staging">テスト環境</label></th>
        <td>{{Form::text('base_url_staging', $siteMap->url_staging, ['id'=>'base_url_staging', 'class' => 'form-control'])}}</td>
      </tr>
    </table>

    <h3>meta</h3>
    <table class="table table--fluid">
      <tr>
        <th><label for="title_prefix">title prefix</label></th>
        <td>{{Form::text('title_prefix', $siteMap->title_prefix, ['id'=>'title_prefix', 'class' => 'form-control'])}}</td>
        <th><label for="title_suffix">title suffix</label></th>
        <td>{{Form::text('title_suffix', $siteMap->title_suffix, ['id'=>'title_suffix', 'class' => 'form-control'])}}</td>
      </tr>
      <tr>
        <th><label for="keywords">keywords</label></th>
        <td colspan="3">{{Form::text('keywords', $siteMap->keywords, ['id'=>'keywords', 'class' => 'form-control'])}}</td>
      </tr>
      <tr>
        <th><label for="description">description</label></th>
        <td colspan="3">{{Form::text('description', $siteMap->description, ['id'=>'description', 'class' => 'form-control'])}}</td>
      </tr>
      <tr>
        <th><label for="og_image">og:image</label></th>
        <td colspan="3">{{Form::text('og_image', $siteMap->og_image, ['id'=>'og_image', 'class' => 'form-control'])}}</td>
      </tr>
    </table>
  </section>

  <h3>ページ一覧</h3>
  <table class="table table--pages">
    <thead>
    <tr>
      <th rowspan="2">ページタイトル</th>
      <th rowspan="2">パス</th>
      <th colspan="6">meta</th>
      <th rowspan="2">CHECK</th>
    </tr>
    <tr>
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
        <td>{{Form::hidden('['.$idx.'][id]', $page->id)}}{{Form::text('['.$idx.'][title]', $page->title)}}</td>
        <td>{{Form::text('['.$idx.'][path]', $page->path)}}</td>
        <td>{{Form::text('['.$idx.'][keywords]', $page->keywords)}}</td>
        <td>{{Form::text('['.$idx.'][description]', $page->description)}}</td>
        <td>{{Form::text('['.$idx.'][ogTitle]', $page->og_title)}}</td>
        <td>{{Form::text('['.$idx.'][ogUrl]', $page->og_url)}}</td>
        <td>{{Form::text('['.$idx.'][ogImage]', $page->og_image)}}</td>
        <td>{{Form::text('['.$idx.'][ogDescription]', $page->og_description)}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <div class="text-center">
    <button type="button" id="add_row" class="btn btn-secondary">追加</button>
  </div>

  <div class="sticky-footer">
    <div class="container sticky-footer__inner">
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
    const template = `<td>{{Form::hidden('pages[?][id]', '?')}}{{Form::text('pages[?][title]', null, ['class'=>'form-control'])}}</td>
      <td>{{Form::text('pages[?][path]', null, ['class'=>'form-control'])}}</td>
      <td>{{Form::text('pages[?][keywords]', null, ['class'=>'form-control'])}}</td>
      <td>{{Form::text('pages[?][description]', null, ['class'=>'form-control'])}}</td>
      <td>{{Form::text('pages[?][og_title]', null, ['class'=>'form-control'])}}</td>
      <td>{{Form::text('pages[?][og_url]', null, ['class'=>'form-control'])}}</td>
      <td>{{Form::text('pages[?][og_image]', null, ['class'=>'form-control'])}}</td>
      <td>{{Form::text('pages[?][og_description]', null, ['class'=>'form-control'])}}</td>`;

    $addRow.addEventListener('click', function (e) {
      e.preventDefault();
      const $newRow = document.createElement('tr');
      $newRow.innerHTML = template.replace(/\?/g, lastIndex);
      $tableBody.appendChild($newRow);
      lastIndex++;

      const ne = new Event('resize');
      window.dispatchEvent(ne)
    })
  </script>
@endsection
