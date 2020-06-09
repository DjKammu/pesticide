<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_test', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('question_id')->nullable();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');

            $table->unsignedBigInteger('test_id')->nullable();
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');

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
        Schema::dropIfExists('question_test');
    }
}
