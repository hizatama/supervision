<div class="container">
    <h3 class="mt-3">基本設定</h3>
    <table class="table table--headers">
        <tr>
            <th class="bg-secondary text-white"><label for="site_name">プロジェクト名</label></th>
            <td colspan="3">
                {{Form::text('sitemap[name]', $siteMap->name, ['id' => 'site_name','class' => 'form-control'])}}
            </td>
        </tr>
        <tr>
            <th class="bg-secondary text-white"><label for="url_production">本番環境</label></th>
            <td>
                <div class="input-group">
                    {{Form::text('sitemap[url_production]', $siteMap->url_production, ['id'=>'url_production', 'class' => 'form-control', 'placeholder' => 'https://example.com'])}}
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="open_production_page">Open</button>
                    </div>
                </div>
            </td>
            <th class="bg-secondary text-white"><label for="url_staging">テスト環境</label></th>
            <td>
                <div class="input-group">
                    {{Form::text('sitemap[url_staging]', $siteMap->url_staging, ['id'=>'url_staging', 'class' => 'form-control', 'placeholder' => 'https://example.com'])}}
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
            <td>{{Form::text('sitemap[charset]', $siteMap->charset, ['id'=>'charset', 'class' => 'form-control'])}}</td>
            <th class="bg-secondary text-white"><label for="keywords">favicon</label></th>
            <td>{{Form::text('sitemap[favicon]', $siteMap->favicon, ['id'=>'favicon', 'class' => 'form-control'])}}</td>
        </tr>
        <tr>
            <th class="bg-secondary text-white"><label for="keywords">title</label></th>
            <td>{{Form::text('sitemap[title]', $siteMap->title, ['id'=>'title', 'class' => 'form-control'])}}</td>
        </tr>
        {{--        <tr>--}}
        {{--          <th class="bg-secondary text-white"><label for="title_prefix">title prefix</label></th>--}}
        {{--          <td>{{Form::text('sitemap[title_prefix]', $siteMap->title_prefix, ['id'=>'title_prefix', 'class' => 'form-control'])}}</td>--}}
        {{--          <th class="bg-secondary text-white"><label for="title_suffix">title suffix</label></th>--}}
        {{--          <td>{{Form::text('sitemap[title_suffix]', $siteMap->title_suffix, ['id'=>'title_suffix', 'class' => 'form-control'])}}</td>--}}
        {{--        </tr>--}}
        <tr>
            <th class="bg-secondary text-white"><label for="keywords">keywords</label></th>
            <td>{{Form::text('sitemap[keywords]', $siteMap->keywords, ['id'=>'keywords', 'class' => 'form-control'])}}</td>
            <th class="bg-secondary text-white"><label for="description">description</label></th>
            <td>{{Form::text('sitemap[description]', $siteMap->description, ['id'=>'description', 'class' => 'form-control'])}}</td>
        </tr>
        <tr>
            <th class="bg-secondary text-white"><label for="og_image">og:url</label></th>
            <td>{{Form::text('sitemap[og_url]', $siteMap->og_url, ['id'=>'og_url', 'class' => 'form-control'])}}</td>
            <th class="bg-secondary text-white"><label for="og_image">og:title</label></th>
            <td>{{Form::text('sitemap[og_title]', $siteMap->og_title, ['id'=>'og_title', 'class' => 'form-control'])}}</td>
        </tr>
        <tr>
            <th class="bg-secondary text-white"><label for="og_image">og:description</label></th>
            <td>{{Form::text('sitemap[og_description]', $siteMap->og_description, ['id'=>'og_description', 'class' => 'form-control'])}}</td>
            <th class="bg-secondary text-white"><label for="og_image">og:image(絶対パス)</label></th>
            <td>{{Form::text('sitemap[og_image]', $siteMap->og_image, ['id'=>'og_image', 'class' => 'form-control'])}}</td>
        </tr>
    </table>
</div>
<script>
  document.getElementById('open_production_page').addEventListener('click', function(e){
    e.preventDefault();
    window.open(document.getElementById('url_production').value, '_blank');
  });

  document.getElementById('open_staging_page').addEventListener('click', function(e){
    e.preventDefault();
    window.open(document.getElementById('url_staging').value, '_blank');
  });
</script>
