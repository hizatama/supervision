<?php

use Illuminate\Database\Seeder;

class FeedbackImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('feedback_image')->insert([
        [
          'feedback_id' => 1,
          'no' => 1,
          'title' => 'テストページ1',
          'filename' => '1.jpg',
        ],
        [
          'feedback_id' => 1,
          'no' => 2,
          'title' => 'テストページ2',
          'filename' => '2.jpg',
        ]
      ]);
    }
}
