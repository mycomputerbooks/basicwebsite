<?php

Route::get('/', 'PagesController@getHome')->name('index');

//==================== eduonix ========================================
Route::get('/eduonix/about', 'PagesController@getEduonixAbout')->name('about');
Route::get('/eduonix/contact', 'PagesController@getEduonixContact');
Route::get('/eduonix/message', 'courses\eduonix\MessagesController@getMessage'); //return view('messages')
Route::post('/contact/submit', 'courses\eduonix\MessagesController@submit'); //submit button contact view
//============================================================
//Route::get('/index', 'AlbumsController@index');
//Route::get('/albums', 'AlbumsController@index');
Route::get('albums/create', 'AlbumsController@create');
Route::get('/albums/{id}', 'AlbumsController@show');
Route::post('/albums/store', 'AlbumsController@store');
//Route::post('/store', 'AlbumsController@store'); //also works

    //laravel view - Edwin
Route::get('/laravelview/questions', 'PagesController@getLaravelViewQuestions');
Route::resource('/questionsview', 'courses\foundations\QuestionsViewController');

//=====Laravel Foundations: Basics to Every App Packt =======================================================
//Laravel created the QuestionController so it knows how to handle all the routes within it with Route::resource
Route::resource('questions', 'courses\foundations\QuestionController');
Route::resource('answers', 'courses\foundations\AnswersController', ['except' => ['index', 'create', 'show']]);

Route::get('/foundations/contact', 'PagesController@getFoundationsContact')->name('foundationsContact');
Route::post('/foundations/contact', 'PagesController@getFoundationsSubmitContact');

Route::get('/profile/{user}', 'PagesController@profile')->name('profile');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/upload', 'courses\foundations\UploadController@getUpload')->name('upload');
Route::post('/upload', 'courses\foundations\UploadController@postUpload');
Route::get('/github/{username}', 'courses\foundations\ApiController@github')->name('github');
Route::get('/weather', 'courses\foundations\ApiController@getWeather')->name('weather');
Route::post('/weather', 'courses\foundations\ApiController@postWeather');



//laravel view - Edwin resource controller
Route::resource('/tasks', 'courses\laravelView\TasksController');
Route::get('/laravelview/todo', 'PagesController@getLaravelViewToDo');

//=== tests ================================================
Route::get('/text', 'PagesController@getText');   //basic text test response
// Route::resource('dogs', 'courses\tests\DogController');
// Route::resource('dogComments', 'courses\tests\DogCommentsController', ['except' => ['index', 'create', 'show']]);
Route::resource('chapters', 'courses\tests\ChapterController');
Route::resource('chapterComments', 'courses\tests\ChapterCommentsController', ['except' => ['index', 'create', 'show']]);
Route::resource('users', 'courses\foundations\UserController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/futureUploads', 'courses\foundations\UploadController@FutureUploads')->name('futureUploads');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
  named routes
    example: ->name('about');
    when creating url can just use name instead of full url address

  php artisan route:list

*/


