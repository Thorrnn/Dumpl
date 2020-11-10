<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('body');
            $table->string('info');
            $table->text('annotation');
            $table->enum('status',['published', 'unpublished']);
            $table->bigInteger('author_id')->unsigned();
            $table->string('info');
            $table->enum('fieldsArticles',['ecology', 'economy', 'medicine', 'physicalEducation' , 'pedagogy' , 'management' , 'art' , 'science']);
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('author_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('articles');
    }
}
