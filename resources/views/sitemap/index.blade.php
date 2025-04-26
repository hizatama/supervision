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
          <td><a href="{{route('sitemap.show', ['sitemap' => $sitemap->key])}}">制作管理</a></td>
          <td>{{$sitemap->updated_at}}</td>
        </tr>
      @endforeach
    </table>
  </div>

  <div class="sticky-footer is-fixed">
    <div class="sticky-footer__inner">
      <div class="text-right">
        <form action="{{route('sitemap.add')}}" method="post" id="add_form">
          @csrf
          <input type=button class="btn btn-secondary exec-add-page" value="サイトを追加する">
        </form>
      </div>
    </div>
  </div>

  <form id="delete_form" action="{{route('sitemap.destroy', ['sitemap' => '1'])}}" method="post">
    @csrf
    @method('DELETE')
  </form>
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
