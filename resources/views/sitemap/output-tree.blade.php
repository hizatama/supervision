@foreach($pages as $page)
  <li class="node"><div class="node-item">{{$page['title']}}</div></li>
  @if(count($page['children']))
    <li class="child">
      <ul class="tree">
        @include('sitemap.output-tree', ['pages' => $page['children']])
      </ul>
    </li>
  @endif
@endforeach
