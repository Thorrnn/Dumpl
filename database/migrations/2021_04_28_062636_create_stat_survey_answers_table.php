<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatSurveyAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stat_survey_answers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('answer_id');
            $table->integer('average');
            $table->integer('min');
            $table->integer('max');
            $table->integer('sum');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('answer_id')
                ->references('id')->on('survey_answers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stat_survey_answers');
    }
}
