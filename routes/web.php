<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/











    Auth::routes();
    Route::resource('editor', 'CKEditorController');
    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

    /** Admin side **/
    Route::group(['middleware' => ['status', 'auth']], function (){
        $groupData =[
            'namespace' => 'Blog\Admin',
            'prefix' => 'admin',
        ];

        Route::group($groupData, function (){
            Route::resource('admin/index', 'MainController')
                ->names('blog.admin.index');
        });
    });
    //Route::get('user/index', 'Blog\User\MainController@index')->name('index');
    Route::get('/welcome', 'HomeController@index')->name('welcome');
    Route::get('/', 'HomeController@home')->name('home');
    Route::resource('user','\App\Http\Controllers\Blog\Admin\UserController')
        ->names('blog.admin.users');
    Route::resource('article','\App\Http\Controllers\Blog\Admin\ArticleController')
        ->names('blog.admin.articles');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::resource('survey','\App\Http\Controllers\Blog\Admin\SurveyController')
        ->names('blog.admin.surveys');
    Route::resource('test','\App\Http\Controllers\Blog\Admin\TestController')
        ->names('blog.admin.tests');
    Route::resource('survey_question','\App\Http\Controllers\Blog\Admin\SurveyQuestionController')
        ->names('blog.admin.survey_questions');
    Route::get('survey_question/create/{id}', '\App\Http\Controllers\Blog\Admin\SurveyQuestionController@add_question_survey')->name('add_question_survey');
    Route::resource('test_question','\App\Http\Controllers\Blog\Admin\TestQuestionController')
        ->names('blog.admin.test_questions');
    Route::get('test_question/create/{id}', '\App\Http\Controllers\Blog\Admin\TestQuestionController@add_question')->name('add_question');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


    Route::resource('u_survey','\App\Http\Controllers\Blog\User\SurveyController')
        ->names('blog.user.surveys');

    Route::resource('u_test','\App\Http\Controllers\Blog\User\TestController')
        ->names('blog.user.tests');

    Route::get('pass_poll/{id}', '\App\Http\Controllers\Blog\User\SurveyController@pass_poll')->name('blog.user.surveys.pass_poll');
    Route::get('pass_poll_test/{id}', '\App\Http\Controllers\Blog\User\TestController@pass_poll_test')->name('blog.user.tests.pass_poll_test');

    Route::get('blog.user.surveys.store_surveys', '\App\Http\Controllers\Blog\User\SurveyController@store_surveys')->name('blog.user.surveys.store_surveys');
    Route::get('blog.user.surveys.store_tests', '\App\Http\Controllers\Blog\User\TestController@store_tests')->name('blog.user.surveys.store_tests');
    Route::get('/welcome', 'HomeController@index')->name('welcome');

    Route::resource('survey_answer','\App\Http\Controllers\Blog\Admin\SurveyAnswerController')
    ->names('blog.admin.survey_answers');
Route::resource('test_answer','\App\Http\Controllers\Blog\Admin\TestAnswerController')
    ->names('blog.admin.test_answers');

Route::resource('survey_analysis','\App\Http\Controllers\Blog\Admin\SurveyAnalysisController')
    ->names('blog.admin.survey_analysis');
Route::resource('test_analysis','\App\Http\Controllers\Blog\Admin\TestAnalysisController')
    ->names('blog.admin.test_analysis');



