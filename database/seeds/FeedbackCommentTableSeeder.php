<?php

use Illuminate\Database\Seeder;

class FeedbackCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('feedback_comment')->insert([
        [
          'feedback_image_id' => 1,
          'no' => 1,
          'x' => 50,
          'y' => 50,
          'width' => 250,
          'height' => 300,
          'comment' => 'ここにコメントが入ります',
        ],
        [
          'feedback_image_id' => 1,
          'no' => 2,
          'x' => 100,
          'y' => 400,
          'width' => 400,
          'height' => 150,
          'comment' => '何かのコメントが入るはず',
        ]
      ]);
    }
}
