<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteMapPagesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('site_map_pages', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('path');
      $table->string('name');
      $table->string('title');
      $table->string('keywords');
      $table->string('description');
      $table->string('og_title');
      $table->string('og_url');
      $table->string('og_description');
      $table->string('og_image');
      $table->string('favicon');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('site_map_pages');
  }
}
