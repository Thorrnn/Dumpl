<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('login');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('name');
            $table->string('surname');
            $table->integer('age');
            $table->enum('role',['admin', 'moderator','user']);
            $table->enum('sex',['male', 'female']);
            $table->enum('education',['preschool', 'generalSecondary', 'out-of-school', 'vocational', 'higher',
                    'postgraduate', 'graduateSchool', 'doctoralStudies', 'self-education']);
            $table->enum('fieldActivity',['ecology', 'economy', 'medicine', 'physicalEducation' , 'pedagogy' , 'management' , 'art' , 'science']);
            $table->string('aboutMyself');
            $table->rememberToken();
            $table->timestamps();
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
