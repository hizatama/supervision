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
        'path' => '/',
        'name' => 'TOPページ',
        'title' => '●●株式会社',
        'title_use_common' => false,
        'keywords' => '',
        'keywords_use_common' => true,
        'description' => '●●株式会社はあれをあれしている会社です',
        'description_use_common' => false,
        'og_title' => '',
        'og_title_use_common' => true,
        'og_url' => '',
        'og_url_use_common' => true,
        'og_description' => '',
        'og_description_use_common' => true,
        'og_image' => '',
        'og_image_use_common' => true,
        'favicon' => '',
        'favicon_use_common' => true,
      ],
      [
        'path' => '/about.html',
        'name' => '会社概要',
        'title' => '会社概要｜●●株式会社',
        'title_use_common' => false,
        'keywords' => '',
        'keywords_use_common' => true,
        'description' => '●●株式会社の会社概要です',
        'description_use_common' => false,
        'og_title' => '',
        'og_title_use_common' => true,
        'og_url' => '',
        'og_url_use_common' => true,
        'og_description' => '',
        'og_description_use_common' => true,
        'og_image' => '',
        'og_image_use_common' => true,
        'favicon' => '',
        'favicon_use_common' => true,
      ]
    ]);
  }
}
