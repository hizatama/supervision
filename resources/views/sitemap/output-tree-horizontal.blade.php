@foreach($pages as $page)
  <li class="node">
    <div class="parent">
      <div class="node-item">{{$page['title']}}</div>
    </div>
    @if(count($page['children']))
    <div class="child">
      <ul class="tree-horizontal">
        @include('sitemap.output-tree-horizontal', ['pages' => $page['children']])
      </ul>
    </div>
    @endif
  </li>
@endforeach
