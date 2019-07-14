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
      $table->string('path')->nullable();
      $table->string('name');
      $table->string('title')->nullable()->default('');
      $table->boolean('title_use_common')->default(false);
      $table->string('keywords')->nullable();
      $table->boolean('keywords_use_common')->default(true);
      $table->string('description')->nullable();
      $table->boolean('description_use_common')->default(false);
      $table->string('og_title')->nullable();
      $table->boolean('og_title_use_common')->default(true);
      $table->string('og_url')->nullable();
      $table->boolean('og_url_use_common')->default(true);
      $table->string('og_description')->nullable();
      $table->boolean('og_description_use_common')->default(false);
      $table->string('og_image')->nullable();
      $table->boolean('og_image_use_common')->default(true);
      $table->string('favicon')->nullable();
      $table->boolean('favicon_use_common')->default(true);
      $table->string('charset')->nullable();
      $table->boolean('charset_use_common')->default(true);
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
