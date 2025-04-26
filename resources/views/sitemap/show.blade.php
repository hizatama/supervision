@extends('layout')
@section('css')

@endsection
@section('header')

@endsection
@section('content')
<form action="{{route('sitemap.store')}}" method="post" id="sitemap_form">
  @csrf
  <input type="hidden" name="key" value="{{$siteMap->key}}">
  <div>
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

    <div class="container-fluid head bg-light">
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
{{--        <li class="nav-item">--}}
{{--          <a class="nav-link" id="output-tab" data-toggle="tab" href="#output">サイトマップ</a>--}}
{{--        </li>--}}
        <li class="nav-item" style="margin-left: auto;">
          <a class="nav-link" id="feature-tab" data-toggle="tab" href="#feature">今後の予定</a>
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
{{--      <div class="tab-pane main-tab-pane fade" id="output" role="tabpanel" aria-labelledby="output-tab">--}}
{{--        @include('sitemap.tab-output')--}}
{{--      </div>--}}
      <div class="tab-pane main-tab-pane fade" id="feature" role="tabpanel" aria-labelledby="feature-tab">
        @include('sitemap.tab-todo')
      </div>
    </div>

  </div>

  <div class="sticky-footer is-fixed">
    <div class="sticky-footer__inner">
      <div class="text-right">
        <button type="submit" class="btn btn-primary">登録する</button>
      </div>
    </div>
  </div>
</form>
<form action="{{route('sitemap.check', ['key' => $siteMap->key])}}" method="get" id="check_page_form">
  @csrf
</form>
<form action="{{route('sitemap.output')}}" method="get" id="sitemap_form" target="_blank">
  @csrf
</form>
@endsection
@section('scripts')
@endsection
