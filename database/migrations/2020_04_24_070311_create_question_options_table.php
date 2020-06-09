<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('question_id')->nullable();
             $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->text('option_text');
            $table->tinyInteger('correct')->nullable()->default(0);
            
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
        Schema::dropIfExists('questions_options');
    }
}
