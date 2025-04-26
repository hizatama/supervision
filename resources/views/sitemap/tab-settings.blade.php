<div class="container">
  <h3 class="mt-3">基本設定</h3>
  <table class="table table--headers">
    <tr>
      <th class="bg-secondary text-white"><label for="site_name">プロジェクト名</label></th>
      <td colspan="3">
        <input type="text" name="sitemap[name]" value="{{$siteMap->name}}" id="site_name" class="form-control">
      </td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label for="url_production">本番環境</label></th>
      <td>
        <div class="input-group">
          <input type="text" name="sitemap[url_production]" value="{{$siteMap->url_production}}" id="url_production" class="form-control" placeholder="https://example.com">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="open_production_page">Open</button>
          </div>
        </div>
      </td>
      <th class="bg-secondary text-white"><label for="url_staging">テスト環境</label></th>
      <td>
        <div class="input-group">
          <input type="text" name="sitemap[url_staging]" value="{{$siteMap->url_staging}}" id="url_staging" class="form-control" placeholder="https://example.com">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="open_staging_page">Open</button>
          </div>
        </div>
      </td>
    </tr>
  </table>

  <h3 class="mt-3">head</h3>
  <table class="table table--headers">
    <tr>
      <th class="bg-secondary text-white"><label for="keywords">charset</label></th>
      <td>
        <input type="text" name="sitemap[charset]" value="{{$siteMap->charset}}" id="charset" class="form-control">
      </td>
      <th class="bg-secondary text-white"><label for="keywords">favicon</label></th>
      <td>
        <input type="text" name="sitemap[favicon]" value="{{$siteMap->favicon}}" id="favicon" class="form-control">
      </td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label for="keywords">title</label></th>
      <td>
        <input type="text" name="sitemap[title]" value="{{$siteMap->title}}" id="title" class="form-control">
      </td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label for="keywords">keywords</label></th>
      <td>
        <input type="text" name="sitemap[keywords]" value="{{$siteMap->keywords}}" id="keywords" class="form-control">
      </td>
      <th class="bg-secondary text-white"><label for="description">description</label></th>
      <td>
        <input type="text" name="sitemap[description]" value="{{$siteMap->description}}" id="description" class="form-control">
      </td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label for="og_image">og:url</label></th>
      <td>
        <input type="text" name="sitemap[og_url]" value="{{$siteMap->og_url}}" id="og_url" class="form-control">
      </td>
      <th class="bg-secondary text-white"><label for="og_image">og:title</label></th>
      <td>
        <input type="text" name="sitemap[og_title]" value="{{$siteMap->og_title}}" id="og_title" class="form-control">
      </td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label for="og_image">og:description</label></th>
      <td>
        <input type="text" name="sitemap[og_description]" value="{{$siteMap->og_description}}" id="og_description" class="form-control">
      </td>
      <th class="bg-secondary text-white"><label for="og_image">og:image(絶対パス)</label></th>
      <td>
        <input type="text" name="sitemap[og_image]" value="{{$siteMap->og_image}}" id="og_image" class="form-control">
      </td>
    </tr>
  </table>
</div>
<script>
  document.getElementById('open_production_page').addEventListener('click', function (e) {
    e.preventDefault();
    window.open(document.getElementById('url_production').value, '_blank');
  });

  document.getElementById('open_staging_page').addEventListener('click', function (e) {
    e.preventDefault();
    window.open(document.getElementById('url_staging').value, '_blank');
  });
</script>
