<?php

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
use App\Http\Middleware\CheckURLMiddleware;

Auth::routes();
Route::get('aidata', 'AIdataController@index');
Route::post('aidata/upload', 'AIdataController@upload')->name('aidataupload');
Route::post('aidata/list', 'AIdataController@list');
Route::get('showmodel', 'AIdataController@showmodel');
Route::get('/home', 'HomeController@index')->name('home');

//////以下は本番用
//ホーム画面
Route::get('/', 'HomeController@index');
//新規プロジェクトの作成
Route::get('new', 'ProjectController@form');//新規プロジェクト作成画面
Route::get('user', 'UserController@index')->middleware('auth');//ユーザのホームに飛ぶ
Route::post('new', 'ProjectController@create');//新規プロジェクトの登録

//ユーザプロジェクト管理画面
Route::get('{userid}', 'HomeController@index')->middleware('CheckUserMiddleware');//ユーザのホームに飛ぶ
Route::get('{userid}/projects', 'ProjectController@index')->middleware('CheckUserMiddleware');//プロジェクト一覧
Route::get('{userid}/{projectname}', 'ProjectController@project')->middleware('CheckUserMiddleware')->middleware('CheckProjectMiddleware');//プロジェクトホーム。生データの一覧


Route::get('{userid}/{projectname}/new', 'RawController@new')->middleware('CheckProjectMiddleware');//新規生データの登録
Route::get('{userid}/{projectname}/raws', 'RawController@index')->middleware('CheckProjectMiddleware');//生データ一覧
Route::get('{userid}/{projectname}/raw/{rawname}', 'RawController@raw')->middleware('CheckRawMiddleware');//生データの閲覧
Route::get('{userid}/{projectname}/raw/{rawname}/format', 'RawController@format')->middleware('CheckRawMiddleware');//生データの加工

Route::get('{userid}/{projectname}/format', 'FormatController@index')->middleware('CheckProjectMiddleware');//加工データの一覧
Route::get('{userid}/{projectname}/format/new', 'FormatController@new')->middleware('CheckProjectMiddleware');//加工データの作成
Route::get('{userid}/{projectname}/format/{formatname}', 'FormatController@show')->middleware('CheckFormatMiddleware');//加工データの閲覧
Route::get('{userid}/{projectname}/format/{formatname}/bind', 'FormatController@bind')->middleware('CheckFormatMiddleware');//加工データの結合

Route::get('{userid}/{projectname}/bind', 'BindController@index');//結合データの一覧

//クローリング用
//Route::get('{userid}/crawl', 'RawController@show');//データクロール





Route::get('/home', 'HomeController@index')->name('home');
