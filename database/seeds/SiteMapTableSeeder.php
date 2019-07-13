<?php

use Illuminate\Database\Seeder;

class SiteMapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('site_maps')->insert([
        'url_production' => 'https://deveative.net',
        'url_staging' => 'https://stg.deveative.net',
        'title_prefix' => '',
        'title_suffix' => '｜DEVEATIVE',
        'keywords' => 'DEVEATIVE,Develop,Design,Hoge,Fuga',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dolor eligendi eum fugit',
        'og_title' => 'DEVEATIVE',
        'og_url' => '/',
        'og_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dolor eligendi eum fugit',
        'og_image' => '',
        'favicon' => '/favicon.ico',
      ]);
    }
}
