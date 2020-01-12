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
      $table->string('key')->unique();
      $table->string('name');
      $table->integer('project_type')->nullable();
      $table->string('project_type_other')->nullable();
      // ヒアリングシート
      $table->string('site_domain')->nullable();
      $table->string('test_server')->nullable();
      $table->string('browser_list')->nullable();
      $table->string('min_width')->nullable();
      $table->string('min_height')->nullable();
      $table->string('max_width')->nullable();
      $table->string('max_height')->nullable();
      $table->string('browser_other')->nullable();
      $table->string('design_regulation')->nullable();
      $table->string('coding_regulation')->nullable();
      $table->text('naming_rule')->nullable();
      $table->integer('path_type')->nullable();
      $table->text('path_type_other')->nullable();
      $table->text('directory_rule')->nullable();
      $table->text('develop_other')->nullable();
      $table->string('base_font_family')->nullable();
      $table->string('base_font_size')->nullable();
      $table->string('width_rule')->nullable();
      $table->string('font_size_rule')->nullable();
      $table->string('a18y_rule')->nullable();
      $table->integer('contact_form_type')->nullable();
      $table->text('contact_form_type_other')->nullable();
      $table->integer('delivery_rule')->nullable();
      $table->string('delivery_date')->nullable();
      $table->integer('cms_type')->nullable();
      $table->string('cms_setup')->nullable();
      $table->text('cms_type_other')->nullable();

      // 共通設定
      $table->string('url_production')->nullable();
      $table->string('url_staging')->nullable();
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
