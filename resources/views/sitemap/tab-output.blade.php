<div class="container">

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" id="horizontal-tab" data-toggle="tab" href="#horizontal">横出力</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="vertical-tab" data-toggle="tab" href="#vertical">縦出力</a>
    </li>
  </ul>

  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="horizontal" role="tabpanel" aria-labelledby="horizontal-tab">
      <ul class="tree tree-horizontal root">
        @include('sitemap.output-tree', ['pages' => $pageHierarchy])
      </ul>
    </div>
    <div class="tab-pane fade" id="vertical" role="tabpanel" aria-labelledby="vertical-tab">
      <ul class="tree tree-vertical root">
        @include('sitemap.output-tree', ['pages' => $pageHierarchy])
      </ul>
    </div>
  </div>
</div>
