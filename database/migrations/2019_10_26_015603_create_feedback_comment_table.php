<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_comment', function (Blueprint $table) {
            $table->unsignedBigInteger('feedback_image_id');
            $table->unsignedBigInteger('no');
            $table->integer('x');
            $table->integer('y');
            $table->integer('width');
            $table->integer('height');
            $table->text('comment');
            $table->timestamps();

            $table->primary(['feedback_image_id', 'no']);
            $table->index('feedback_image_id');
//            $table->foreign('feedback_image_id')
//                  ->references('id')
//                  ->on('feedback_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_comment');
    }
}
