<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveiesQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('surveies_questions', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->bigIncrements('id');
                $table->string('body');
                $table->enum('type',['text', 'integer']);
                $table->string('text_answer');
                $table->integer('integer_answer');
                $table->timestamps();
                $table->softDeletes();

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
        Schema::dropIfExists('surveies_questions');
    }
}
