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
Route::get('{userid}', 'HomeController@index')->middleware('CheckURLMiddleware');//ユーザのホームに飛ぶ
Route::get('{userid}/projects', 'ProjectController@index')->middleware('CheckURLMiddleware');//プロジェクト一覧
Route::get('{userid}/{project}', 'ProjectController@project');//プロジェクトホーム。生データの一覧


Route::get('{userid}/{project}/new', 'RawController@new');//新規生データの登録
Route::get('{userid}/{project}/raw/{raw}', 'RawController@show');//生データの閲覧
Route::get('{userid}/{project}/raw/{raw}/format', 'RawController@edit');//生データの加工

Route::get('{userid}/{project}/format', 'FormatController@index');//加工データの一覧
Route::get('{userid}/{project}/format/{format}', 'FormatController@index');//加工データの閲覧
Route::get('{userid}/{project}/format/{format}/bind', 'FormatController@index');//加工データの結合

Route::get('{userid}/{project}/bind', 'BindController@index');//結合データの一覧

//クローリング用
//Route::get('{userid}/crawl', 'RawController@show');//データクロール





Route::get('/home', 'HomeController@index')->name('home');
