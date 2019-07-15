@foreach($pages as $path => $page)
  <li class="node">
    <div class="parent">
      <div class="node-item">
        {{Form::text($path, $page['title'], ['class' => 'node-textbox'])}}
      </div>
    </div>
    @if(count($page['children']))
      <div class="child">
        <ul class="tree">
          @include('sitemap.output-tree', ['pages' => $page['children']])
        </ul>
      </div>
    @endif
  </li>
@endforeach
