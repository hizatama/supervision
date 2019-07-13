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
        'url_production' => 'http://127.0.0.1:8080',
        'url_staging' => 'http://127.0.0.1:8888',
        'charset' => 'utf-8',
        'title_prefix' => '',
        'title_suffix' => '',
        'keywords' => 'Develop,Design,Hoge,Fuga',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dolor eligendi eum fugit',
        'og_title' => '●●株式会社',
        'og_url' => '/',
        'og_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dolor eligendi eum fugit',
        'og_image' => 'http://127.0.0.1:8080/og_image.png',
        'favicon' => '/favicon.ico',
      ]);
    }
}
