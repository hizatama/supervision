<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckHistoryDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_history_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('sitemap_id');
            $table->integer('history_id');
            $table->integer('page_id');
            $table->string('key');
            $table->string('type');
            $table->string('message');
            $table->timestamps();

            $table->foreign('sitemap_id')->references('id')->on('site_maps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_history_detail');
    }
}
