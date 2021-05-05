<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /*  дошкольное образование; preschool education;
        общее среднее образование; general secondary education;
        внешкольное образование; out-of-school education;
        профессионально-техническое образование; vocational education;
        высшее образование; higher education;
        последипломное образование; postgraduate education;
        аспирантуру; graduate school;
        докторантуру; doctoral studies;
        самообразование. self-education.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('login');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('name');
            $table->string('surname');
            $table->integer('age');
            $table->enum('role',['admin', 'moderator','user']);
            $table->enum('sex',['male', 'female']);
            $table->enum('education',['preschool', 'generalSecondary_start', 'generalSecondary_middle','generalSecondary_high','out-of-school', 'vocational', 'higher',
                'postgraduate', 'graduateSchool', 'doctoralStudies', 'self-education']);
            $table->enum('fieldActivity',['ecology', 'economy', 'medicine', 'physicalEducation' , 'pedagogy' , 'management' , 'art' , 'science']);
            $table->string('aboutMyself');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
