<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
      SiteMapTableSeeder::class,
      SiteMapPagesTableSeeder::class,
      FeedbackTableSeeder::class,
      FeedbackImageTableSeeder::class,
      FeedbackCommentTableSeeder::class,
    ]);
  }
}
