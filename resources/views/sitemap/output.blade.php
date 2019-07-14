@extends('layout')
@section('css')
@endsection
@section('header')

@endsection
@section('content')
  <div style="max-width: 400px">
    <ul class="tree root">
      @include('sitemap.output-tree', ['pages' => $pages])
    </ul>
  </div>
@endsection
