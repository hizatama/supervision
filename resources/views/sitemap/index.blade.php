@extends('layout')
@section('css')

@endsection
@section('header')

@endsection
@section('content')

  <div class="container-fluid">
    <table class="table table--fluid">
      <tr>
        <th>サイト名</th>
        <th>アクション</th>
        <th>最終更新日時</th>
      </tr>
      @foreach($siteMaps as $sitemap)
        <tr>
          <td>{{$sitemap->name}}</td>
          <td>{{Html::link(route('sitemap.show', ['key' => $sitemap->key]), '制作管理')}}</td>
          <td>{{$sitemap->updated_at}}</td>
        </tr>
      @endforeach
    </table>
  </div>

  <div class="sticky-footer is-fixed">
    <div class="sticky-footer__inner">
      <div class="text-right">
        {{Form::open(['url' => route('sitemap.add'), 'method' => 'post', 'id' => 'add_form'])}}
        {{Form::button('サイトを追加する', ['class' => 'btn btn-secondary exec-add-page'])}}
        {{Form::close()}}
      </div>
    </div>
  </div>

  {{Form::open(['url'=>route('sitemap.destroy', ['key' => '1']), 'method' => 'delete', 'id' => 'delete_form'])}}
  {{Form::close()}}
@endsection
@section('scripts')
  <script>

    document.querySelector('.exec-add-page').addEventListener('click', function (e) {
      e.preventDefault();
      document.getElementById('add_form').submit();
    });

    // document.querySelector('.exec-delete-sitemap').addEventListener('click', function(e){
    //   e.preventDefault();
    //   if(confirm('入力されたデータは保存されません。\nページチェック実行前に保存してください。')) {
    //   }
    // });

  </script>
@endsection
