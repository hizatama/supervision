<?php

use Illuminate\Database\Seeder;

class SiteMapPagesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('site_map_pages')->insert([
      [
        'path' => '',
        'name' => 'TOPページ',
        'title_use_common' => false,
        'title' => '●●株式会社',
        'keywords_use_common' => true,
        'description_use_common' => false,
        'description' => '●●株式会社はあれをあれしている会社です',
        'og_title_use_common' => true,
        'og_title' => null,
        'og_url_use_common' => true,
        'og_url' => null,
        'og_description_use_common' => true,
        'og_image_use_common' => true,
        'favicon_use_common' => true,
        'charset_use_common' => true,
      ],
      [
        'path' => 'about.html',
        'name' => '会社概要',
        'title' => '会社概要｜●●株式会社',
        'title_use_common' => false,
        'keywords_use_common' => true,
        'description' => '●●株式会社の会社概要です',
        'description_use_common' => false,
        'og_title_use_common' => false,
        'og_title' => '会社概要',
        'og_url_use_common' => false,
        'og_url' => 'http://localhost:8080/about.html',
        'og_description_use_common' => true,
        'og_image_use_common' => true,
        'favicon_use_common' => true,
        'charset_use_common' => true,
      ]
    ]);
  }
}
