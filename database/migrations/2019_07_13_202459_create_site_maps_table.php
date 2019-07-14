<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteMapsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('site_maps', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('url_production');
      $table->string('url_staging');
      $table->string('charset')->nullable();
      $table->string('title')->nullable();
      $table->string('title_prefix')->nullable();
      $table->string('title_suffix')->nullable();
      $table->string('keywords')->nullable();
      $table->string('description')->nullable();
      $table->string('og_title')->nullable();
      $table->string('og_url')->nullable();
      $table->string('og_description')->nullable();
      $table->string('og_image')->nullable();
      $table->string('favicon')->nullable();
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
    Schema::dropIfExists('site_maps');
  }
}
