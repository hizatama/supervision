<div class="container">

  <h3 class="mt-3">基本情報</h3>
  <table class="table">
    <tr>
      <th class="bg-secondary text-white"><label for="project_type">案件概要</label></th>
      <td colspan="3">
        <div class="form-check-inline">
          <input type="radio" name="sitemap[project_type]" id="project_type_1" value="1" class="form-check-input" @if($siteMap->project_type == '1') checked @endif>
          <label class="form-check-label" for="project_type_1">新規サイト構築</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" name="sitemap[project_type]" id="project_type_2" value="2" class="form-check-input" @if($siteMap->project_type == '2') checked @endif>
          <label class="form-check-label" for="project_type_2">新規LP制作</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" name="sitemap[project_type]" id="project_type_3" value="3" class="form-check-input" @if($siteMap->project_type == '3') checked @endif>
          <label class="form-check-label" for="project_type_3">既存サイト改修</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" name="sitemap[project_type]" id="project_type_4" value="4" class="form-check-input" @if($siteMap->project_type == '4') checked @endif>
          <label class="form-check-label" for="project_type_4">システム開発</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" name="sitemap[project_type]" id="project_type_5" value="5" class="form-check-input" @if($siteMap->project_type == '5') checked @endif>
          <label class="form-check-label" for="project_type_5">サーバーリプレース</label>
        </div>
        <textarea class="form-control" id="project_type_other" rows="3" name="sitemap[project_type_other]">{{$siteMap->project_type_other}}</textarea>
      </td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label for="site_page_large">ページ数</label></th>
      <td colspan="3">
        <table>
          <tr>
            <th><label for="site_page_lg">大規模</label></th>
            <td>
              <div class="input-group">
                <input type="text" name="sitemap[site_page_lg]" id="site_page_lg" value="{{$siteMap->site_page_lg}}" class="form-control" />
                <div class="input-group-append"><span class="input-group-text">ページ</span></div>
              </div>
            </td>
            <td>
              <div class="form-text text-muted">新規コーディング（3000px以上） トップページ、LP等の大きめのページ</div>
            </td>
          </tr>
          <tr>
            <th><label for="site_page_md">中規模</label></th>
            <td>
              <div class="input-group">
                <input type="text" name="sitemap[site_page_md]" id="site_page_md" value="{{$siteMap->site_page_md}}" class="form-control" />
                <div class="input-group-append"><span class="input-group-text">ページ</span></div>
              </div>
            </td>
            <td>
              <div class="form-text text-muted">新規コーディング（1000px〜2999px程度） 下層詳細ページ、通常のコンテンツ量</div>
            </td>
          </tr>
          <tr>
            <th><label for="site_page_sm">小規模</label></th>
            <td>
              <div class="input-group">
                <input type="text" name="sitemap[site_page_sm]" id="site_page_sm" value="{{$siteMap->site_page_sm}}" class="form-control" />
                <div class="input-group-append"><span class="input-group-text">ページ</span></div>
              </div>
            </td>
            <td>
              <div class="form-text text-muted">新規コーディング（1000px未満） 下層INDEX、テキストのみのシンプルなページ等</div>
            </td>
          </tr>
          <tr>
            <th><label for="site_page_xs">流し込み</label></th>
            <td>
              <div class="input-group">
                <input type="text" name="sitemap[site_page_xs]" id="site_page_xs" value="{{$siteMap->site_page_xs}}" class="form-control" />
                <div class="input-group-append"><span class="input-group-text">ページ</span></div>
              </div>
            </td>
            <td>
              <div class="form-text text-muted">記事の移行、記事ページの書き起こし等の軽微なページの作成</div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label for="site_domain">サイトドメイン</label></th>
      <td>
        <input type="text" name="sitemap[site_domain]" id="site_domain" value="{{$siteMap->site_domain}}" class="form-control" />
      </td>
      <th class="bg-secondary text-white"><label for="test_server">テスト環境有無</label></th>
      <td>
        <div class="form-check">
          <input type="radio" name="sitemap[test_server_type]" id="test_server_type_0" value="0" class="form-check-input" @if($siteMap->test_server_type == '0') checked @endif>
          <label class="form-check-label" for="test_server_type_0">なし</label>
        </div>
        <div class="form-check">
          <input type="radio" name="sitemap[test_server_type]" id="test_server_type_1" value="1" class="form-check-input" @if($siteMap->test_server_type == '1') checked @endif>
          <label class="form-check-label" for="test_server_type_1">調達済み</label>
        </div>
        <div class="form-check">
          <input type="radio" name="sitemap[test_server_type]" id="test_server_type_2" value="2" class="form-check-input" @if($siteMap->test_server_type == '2') checked @endif>
          <label class="form-check-label" for="test_server_type_2">お客様で調達</label>
        </div>
        <div class="form-check">
          <input type="radio" name="sitemap[test_server_type]" id="test_server_type_3" value="3" class="form-check-input" @if($siteMap->test_server_type == '3') checked @endif>
          <label class="form-check-label" for="test_server_type_3">代理店で調達</label>
        </div>
        <div class="form-check">
          <input type="radio" name="sitemap[test_server_type]" id="test_server_type_4" value="4" class="form-check-input" @if($siteMap->test_server_type == '4') checked @endif>
          <label class="form-check-label" for="test_server_type_4">弊社で調達</label>
        </div>
        <div class="mt-3">
          <label for="test_server_type_other">備考</label>
          <textarea class="form-control" id="test_server_type_other" rows="1" name="sitemap[test_server_type_other]">{{$siteMap->test_server_type_other}}</textarea>
        </div>
      </td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label>納品方法</label></th>
      <td>
        <div class="form-check">
          <input type="radio" name="sitemap[delivery_type]" id="delivery_type_1" value="1" class="form-check-input" @if($siteMap->delivery_type == '1') checked @endif>
          <label class="form-check-label" for="delivery_type_1">ファイル送付</label>
        </div>
        <div class="form-check">
          <input type="radio" name="sitemap[delivery_type]" id="delivery_type_2" value="2" class="form-check-input" @if($siteMap->delivery_type == '2') checked @endif>
          <label class="form-check-label" for="delivery_type_2">FTP等でのファイル設置</label>
        </div>
        <div class="form-check">
          <input type="radio" name="sitemap[delivery_type]" id="delivery_type_3" value="3" class="form-check-input" @if($siteMap->delivery_type == '3') checked @endif>
          <label class="form-check-label" for="delivery_type_3">CMS組み込み</label>
        </div>
      </td>
      <th class="bg-secondary text-white"><label for="delivery_date">納期</label></th>
      <td>
        <input type="text" name="sitemap[delivery_date]" id="delivery_date" value="{{$siteMap->delivery_date}}" class="form-control" />
      </td>
    </tr>
  </table>

  <h3 class="mt-3">制作</h3>
  <table class="table">
    <tr>
      <th class="bg-secondary text-white">対象閲覧環境</th>
      <td colspan="3">
        <h4>ブラウザ</h4>
        <div class="row">
          <div class="col">
            <h4><img src="/img/ic_pc.svg" width="40" class="browser-img" alt="PC"></h4>
            <div class="custom-control custom-switch">
              <input type="checkbox" name="browser_list" value="pc:chrome" id="browser_pc_chrome" class="custom-control-input" @if($siteMap->isTargetBrowser('pc:chrome')) checked @endif>
              <label class="custom-control-label" for="browser_pc_chrome">Google Chrome</label>
            </div>
            <div class="custom-control custom-switch">
              <input type="checkbox" name="browser_list" value="pc:firefox" id="browser_pc_firefox" class="custom-control-input" @if($siteMap->isTargetBrowser('pc:firefox')) checked @endif>
              <label class="custom-control-label" for="browser_pc_firefox">Firefox</label>
            </div>
            <div class="custom-control custom-switch">
              <input type="checkbox" name="browser_list" value="pc:safari" id="browser_pc_safari" class="custom-control-input" @if($siteMap->isTargetBrowser('pc:safari')) checked @endif>
              <label class="custom-control-label" for="browser_pc_safari">Safari</label>
            </div>
            <div class="custom-control custom-switch">
              <input type="checkbox" name="browser_list" value="pc:edge" id="browser_pc_edge" class="custom-control-input" @if($siteMap->isTargetBrowser('pc:edge')) checked @endif>
              <label class="custom-control-label" for="browser_pc_edge">Microsoft Edge</label>
            </div>
            <div class="custom-control custom-switch">
              <input type="checkbox" name="browser_list" value="pc:ie11" id="browser_pc_ie11" class="custom-control-input" @if($siteMap->isTargetBrowser('pc:ie11')) checked @endif>
              <label class="custom-control-label" for="browser_pc_ie11">Internet Explorer11</label>
            </div>
          </div>
          <div class="col">
            <h4><img src="/img/ic_tablet.svg" width="40" class="browser-img" alt="タブレット"></h4>
            <div class="custom-control custom-switch">
              <input type="checkbox" name="browser_list" value="tab:safari" id="browser_tab_safari" class="custom-control-input" @if($siteMap->isTargetBrowser('tab:safari')) checked @endif>
              <label class="custom-control-label" for="browser_tab_safari">iPad Safari</label>
            </div>
            <div class="custom-control custom-switch">
              <input type="checkbox" name="browser_list" value="tab:chrome" id="browser_tab_chrome" class="custom-control-input" @if($siteMap->isTargetBrowser('tab:chrome')) checked @endif>
              <label class="custom-control-label" for="browser_tab_chrome">Androidタブレット Chrome</label>
            </div>
          </div>
          <div class="col">
            <h4><img src="/img/ic_smartphone.svg" width="40" class="browser-img" alt="スマートフォン"></h4>
            <div class="custom-control custom-switch">
              <input type="checkbox" name="browser_list" value="sp:safari" id="browser_sp_safari" class="custom-control-input" @if($siteMap->isTargetBrowser('sp:safari')) checked @endif>
              <label class="custom-control-label" for="browser_sp_safari">iPhone Safari</label>
            </div>
            <div class="custom-control custom-switch">
              <input type="checkbox" name="browser_list" value="sp:chrome" id="browser_sp_chrome" class="custom-control-input" @if($siteMap->isTargetBrowser('sp:chrome')) checked @endif>
              <label class="custom-control-label" for="browser_sp_chrome">Androidスマホ Chrome</label>
            </div>
          </div>
          <input type="hidden" name="sitemap[browser_list]" value="{{$siteMap->browser_list}}" id="browser_list">
        </div>

        <h4 class="mt-5">解像度</h4>
        <div class="row">
          <div class="col">
            <label>幅</label>
            <div class="row justify-content-start">
              <div class="col input-group mb-3">
                <input type="text" name="sitemap[min_width]" value="{{$siteMap->min_width}}" id="min_width" class="form-control">
                <div class="input-group-append"><span class="input-group-text">px</span></div>
              </div>
              <div class="col-1">〜</div>
              <div class="col input-group mb-3">
                <input type="text" name="sitemap[max_width]" value="{{$siteMap->max_width}}" id="max_width" class="form-control">
                <div class="input-group-append"><span class="input-group-text">px</span></div>
              </div>
            </div>
            <label>高さ</label>
            <div class="row justify-content-start">
              <div class="col input-group mb-3">
                <input type="text" name="sitemap[min_height]" value="{{$siteMap->min_height}}" id="min_height" class="form-control">
                <div class="input-group-append"><span class="input-group-text">px</span></div>
              </div>
              <div class="col-1">〜</div>
              <div class="col input-group mb-3">
                <input type="text" name="sitemap[max_height]" value="{{$siteMap->max_height}}" id="max_height" class="form-control">
                <div class="input-group-append"><span class="input-group-text">px</span></div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="text">PC解像度シェア</div>
            <table class="table table--fluid small">
              <tr>
                <th class="bg-light">1920x1080</th>
                <td>25.45%</td>
                <th class="bg-light">1366x768</th>
                <td>13.77%</td>
                <th class="bg-light">1536x864</th>
                <td>5.91%</td>
              </tr>
              <tr>
                <th class="bg-light">1440x900</th>
                <td>5.06%</td>
                <th class="bg-light">2560x1440</th>
                <td>4.71%</td>
                <th class="bg-light">360x640</th>
                <td>4.56%</td>
              </tr>
              <tr>
                <th class="bg-light">1280x1024</th>
                <td>3.6%</td>
                <th class="bg-light">1280x720</th>
                <td>3.26%</td>
                <th class="bg-light">1280x800</th>
                <td>3.2%</td>
              </tr>
              <tr>
                <th class="bg-light">1600x900</th>
                <td>2.35%</td>
              </tr>
            </table>
          </div>
        </div>

        <h4 class="mt-3"><label for="browser_other">その他</label></h4>
        <textarea name="sitemap[browser_other]" id="browser_other" class="form-control" rows="1">{{$siteMap->browser_other}}</textarea>
      </td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label for="design_regulation">デザインレギュレーション</label></th>
      <td><input type="text" name="sitemap[design_regulation]" value="{{$siteMap->design_regulation}}" id="design_regulation" class="form-control"></td>
      <th class="bg-secondary text-white"><label for="coding_regulation">コーディングレギュレーション</label></th>
      <td><input type="text" name="sitemap[coding_regulation]" value="{{$siteMap->coding_regulation}}" id="coding_regulation" class="form-control"></td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label for="naming_rule">命名規則</label></th>
      <td><textarea name="sitemap[naming_rule]" id="naming_rule" class="form-control" rows="1">{{$siteMap->naming_rule}}</textarea></td>
      <th class="bg-secondary text-white"><label for="path_type">パスの書き方</label></th>
      <td>
        <div class="form-check">
          <input type="radio" name="sitemap[path_type]" value="1" id="path_type_1" class="form-check-input" @if($siteMap->path_type == '1') checked @endif>
          <label class="form-check-label" for="path_type_1">相対パス（<code>./img/photo.jpg</code>）</label>
        </div>
        <div class="form-check">
          <input type="radio" name="sitemap[path_type]" value="2" id="path_type_2" class="form-check-input" @if($siteMap->path_type == '2') checked @endif>
          <label class="form-check-label" for="path_type_2">ルート相対パス（<code>/img/photo.jpg</code>）</label>
        </div>
        <div class="form-check">
          <input type="radio" name="sitemap[path_type]" value="3" id="path_type_3" class="form-check-input" @if($siteMap->path_type == '3') checked @endif>
          <label class="form-check-label" for="path_type_3">絶対パス（<code>https://example.com/img/photo.jpg</code>）</label>
        </div>
        <label for="path_type_other">備考</label>
        <textarea name="sitemap[path_type_other]" id="path_type_other" class="form-control" rows="1">{{$siteMap->path_type_other}}</textarea>
      </td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label for="directory_rule">フォルダ構成の指定</label></th>
      <td><textarea name="sitemap[directory_rule]" id="directory_rule" class="form-control" rows="1">{{$siteMap->directory_rule}}</textarea></td>
      <th class="bg-secondary text-white"><label for="base_font_family">ベースのフォント</label></th>
      <td><input type="text" name="sitemap[base_font_family]" value="{{$siteMap->base_font_family}}" id="base_font_family" class="form-control"></td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label for="base_font_size">ベースのフォントサイズ</label></th>
      <td><input type="text" name="sitemap[base_font_size]" value="{{$siteMap->base_font_size}}" id="base_font_size" class="form-control"></td>
      <th class="bg-secondary text-white"><label for="font_size_rule">フォントサイズ指定ルール</label></th>
      <td><input type="text" name="sitemap[font_size_rule]" value="{{$siteMap->font_size_rule}}" id="font_size_rule" class="form-control"></td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label for="width_rule">サイト幅の指定</label></th>
      <td><input type="text" name="sitemap[width_rule]" value="{{$siteMap->width_rule}}" id="width_rule" class="form-control"></td>
      <th class="bg-secondary text-white"><label for="a18y_rule">アクセシビリティチェック</label></th>
      <td><input type="text" name="sitemap[a18y_rule]" value="{{$siteMap->a18y_rule}}" id="a18y_rule" class="form-control"></td>
    </tr>
    <tr>
      <th class="bg-secondary text-white">CMS導入</th>
      <td colspan="3">
        <div class="form-check-inline">
          <input type="radio" name="sitemap[cms_type]" value="0" id="cms_type_0" class="form-check-input" @if($siteMap->cms_type == '0') checked @endif>
          <label class="form-check-label" for="cms_type_0">導入しない</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" name="sitemap[cms_type]" value="1" id="cms_type_1" class="form-check-input" @if($siteMap->cms_type == '1') checked @endif>
          <label class="form-check-label" for="cms_type_1">WordPress</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" name="sitemap[cms_type]" value="2" id="cms_type_2" class="form-check-input" @if($siteMap->cms_type == '2') checked @endif>
          <label class="form-check-label" for="cms_type_2">MovableType</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" name="sitemap[cms_type]" value="6" id="cms_type_6" class="form-check-input" @if($siteMap->cms_type == '6') checked @endif>
          <label class="form-check-label" for="cms_type_6">E7</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" name="sitemap[cms_type]" value="8" id="cms_type_8" class="form-check-input" @if($siteMap->cms_type == '8') checked @endif>
          <label class="form-check-label" for="cms_type_8">SITE MANAGE</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" name="sitemap[cms_type]" value="5" id="cms_type_5" class="form-check-input" @if($siteMap->cms_type == '5') checked @endif>
          <label class="form-check-label" for="cms_type_5">Concrete5</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" name="sitemap[cms_type]" value="7" id="cms_type_7" class="form-check-input" @if($siteMap->cms_type == '7') checked @endif>
          <label class="form-check-label" for="cms_type_7">PowerCMS</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" name="sitemap[cms_type]" value="3" id="cms_type_3" class="form-check-input" @if($siteMap->cms_type == '3') checked @endif>
          <label class="form-check-label" for="cms_type_3">SITE PUBLIS</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" name="sitemap[cms_type]" value="4" id="cms_type_4" class="form-check-input" @if($siteMap->cms_type == '4') checked @endif>
          <label class="form-check-label" for="cms_type_4">WebRelease 2</label>
        </div>
        <div class="form-check">
          <input type="radio" name="sitemap[cms_type]" value="99" id="cms_type_99" class="form-check-input" @if($siteMap->cms_type == '99') checked @endif>
          <label class="form-check-label" for="cms_type_99">その他</label>
          <input type="text" name="sitemap[cms_type_other]" value="{{$siteMap->cms_type_other}}" id="cms_type_other" class="form-control" disabled>
        </div>

        <label for="cms_setup">CMS導入担当</label>
        <textarea name="sitemap[cms_setup]" id="cms_setup" class="form-control" rows="1">{{$siteMap->cms_setup}}</textarea>
      </td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label for="contact_form_type">問い合わせフォーム</label></th>
      <td colspan="3">
        <div class="form-check-inline">
          <input type="radio" name="sitemap[contact_form_type]" value="0" id="contact_form_type_0" class="form-check-input" @if($siteMap->contact_form_type == '0') checked @endif>
          <label class="form-check-label" for="contact_form_type_0">設置しない</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" name="sitemap[contact_form_type]" value="1" id="contact_form_type_1" class="form-check-input" @if($siteMap->contact_form_type == '1') checked @endif>
          <label class="form-check-label" for="contact_form_type_1">設置する</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" name="sitemap[contact_form_type]" value="2" id="contact_form_type_2" class="form-check-input" @if($siteMap->contact_form_type == '2') checked @endif>
          <label class="form-check-label" for="contact_form_type_2">外部サービス利用</label>
        </div>

        <br>
        <label for="contact_form_type_other">備考</label>
        <textarea name="sitemap[contact_form_type_other]" id="contact_form_type_other" class="form-control" rows="2">{{$siteMap->contact_form_type_other}}</textarea>
      </td>
    </tr>
    <tr>
      <th class="bg-secondary text-white"><label for="develop_other">その他開発</label></th>
      <td colspan="3">
        <textarea name="sitemap[develop_other]" id="develop_other" class="form-control" rows="2">{{$siteMap->develop_other}}</textarea>
      </td>
    </tr>

  </table>

  <script>
    // =============================
    // checkbox(browser)
    // =============================
    var _browsers = document.querySelectorAll('[name="browser_list"]'),
      _browser_list = document.querySelector('#browser_list');
    var updateBrowserListCsv = function () {
      var selectedBrowsers = [];
      Array.prototype.slice.call(_browsers, 0).forEach(function (el) {
        if (el.checked) selectedBrowsers.push(el.value);
      });
      _browser_list.value = selectedBrowsers.join(',');
    };

    Array.prototype.slice.call(_browsers, 0).forEach(function (el) {
      el.addEventListener('change', updateBrowserListCsv);
    });
    updateBrowserListCsv();

    // =============================
    // checkbox(cms_type)
    // =============================
    var _cmsOther = document.querySelector('#cms_type_99'),
      _cmsRule = document.querySelector('#cms_type_other'),
      _cmsType = document.querySelectorAll('[name="sitemap[cms_type]"]');

    var updateCmsRule = function () {
      _cmsRule.disabled = !_cmsOther.checked;
    };
    Array.prototype.slice.call(_cmsType, 0).forEach(function (el) {
      el.addEventListener('change', updateCmsRule);
    });
    updateCmsRule();

  </script>
</div>
