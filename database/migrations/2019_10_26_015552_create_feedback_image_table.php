<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_image', function (Blueprint $table) {
            $table->unsignedBigInteger('feedback_id');
            $table->unsignedBigInteger('no');
            $table->string('title');
            $table->string('filename');
            $table->timestamps();

            $table->primary(['feedback_id', 'no']);
            $table->index('feedback_id');
//            $table->foreign('feedback_id')
//                  ->references('id')
//                  ->on('feedback');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_image');
    }
}
