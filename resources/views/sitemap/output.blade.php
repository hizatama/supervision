@extends('layout')
@section('css')
@endsection
@section('header')

@endsection
@section('content')
  <div class="container">

    <h1>サイトマップ</h1>

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" id="vertical-tab" data-toggle="tab" href="#vertical">縦出力</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="horizontal-tab" data-toggle="tab" href="#horizontal">横出力</a>
      </li>
    </ul>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="vertical" role="tabpanel" aria-labelledby="vertical-tab">
        <ul class="tree-vertical root">
          @include('sitemap.output-tree', ['pages' => $pages])
        </ul>
      </div>
      <div class="tab-pane fade" id="horizontal" role="tabpanel" aria-labelledby="horizontal-tab">
        <ul class="tree-horizontal root">
          @include('sitemap.output-tree-horizontal', ['pages' => $pages])
        </ul>
      </div>
    </div>
  </div>
@endsection
