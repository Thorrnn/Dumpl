<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('annotation');
            $table->UnsignedBigInteger('article_id');
            $table->UnsignedBigInteger('type_id');
            $table->enum('status',['published', 'unpublished']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('article_id')
                ->references('id')->on('articles')
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
        Schema::dropIfExists('tests');
    }
}
