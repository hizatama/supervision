<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_history', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('sitemap_id');
            $table->bigInteger('revision');
            $table->boolean('is_passed');
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
        Schema::dropIfExists('check_history');
    }
}
