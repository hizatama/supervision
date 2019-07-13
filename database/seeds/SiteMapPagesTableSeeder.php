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
      'path' => '/',
      'name' => 'TOPページ',
      'title' => 'DEVEATIVE',
      'keywords' => '',
      'description' => '',
      'og_title' => '',
      'og_url' => '',
      'og_description' => '',
      'og_image' => '',
      'favicon' => '',
    ]);
  }
}
