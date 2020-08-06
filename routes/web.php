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








Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Auth::routes();
    Route::resource('editor', 'CKEditorController');
    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

    Route::get('/home', 'HomeController@index')->name('home');
    /** Admin side **/

    Route::group(['middleware' => ['status', 'auth']], function (){
        $groupData =[
            'namespace' => 'Blog\Admin',
            'prefix' => 'admin',
        ];

        Route::group($groupData, function (){
            Route::resource('index', 'MainController')
                ->names('blog.admin.index');



        });
    });

    Route::get('user/index', 'Blog\User\MainController@index');
});




//Переключение языков
Route::get('setlocale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl();; //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[1], App\Http\Middleware\LocaleMiddleware::$languages)) {

        unset($segments[1]); //удаляем метку
    }

    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    array_splice($segments, 1, 0, $lang);

    //формируем полный URL
    $url = Request::root().implode("/", $segments);

    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url); //Перенаправляем назад на ту же страницу

})->name('setlocale');
