<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersSurveyQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('answers_survey_question', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->bigIncrements('id');
                $table->string('title');
                $table->enum('type',['text', 'integer']);
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('survey_question_id')
                    ->references('id')->on('surveys_questions')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            });

        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers_survey_question');
    }
}
