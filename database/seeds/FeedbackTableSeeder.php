<?php

use Illuminate\Database\Seeder;

class FeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('feedback')->insert([
        [
          'key' => '5a105e8b9d40e1329780d62ea2265d8a', // hash('md5', 'test1')
        ]
      ]);
    }
}
