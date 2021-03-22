<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_questions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('option_a');
            $table->string('option_b');
            $table->string('option_c');
            $table->BigInteger('test_id');
            $table->string('option_correct');


            $table->timestamps();
            $table->softDeletes();

            $table->foreign('test_id')
                ->references('id')->on('tests')
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
        Schema::dropIfExists('test_questions');
    }
}
