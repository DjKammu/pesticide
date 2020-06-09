<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('lesson_image')->nullable();
            $table->text('short_text')->nullable();
            $table->text('full_text')->nullable();
            $table->integer('position')->nullable()->unsigned();
            $table->string('downloadable_files')->nullable();
            $table->tinyInteger('free_lesson')->nullable()->default(0);
            $table->tinyInteger('published')->nullable()->default(0);
            
            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
