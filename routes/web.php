<?php
//declare(strict_types=1);

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


Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function() {
  Route::get('/news', [\App\Http\Controllers\Admin\NewsController::class, 'index'])
	  ->name('admin.news');
  Route::get('/news/create', [\App\Http\Controllers\Admin\NewsController::class, 'create']);
  Route::get('/news/edit/{id}', [\App\Http\Controllers\Admin\NewsController::class, 'edit'])
	  ->where('id', '\d+');
  Route::get('/news/delete/{id}', [\App\Http\Controllers\Admin\NewsController::class, 'destroy'])
	  ->where('id', '\d+');
});

//categories
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [\App\Http\Controllers\CategoryController::class, 'show'])
	->where('id', '\d+')
	->name('categories.show');
//news
Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [\App\Http\Controllers\NewsController::class, 'show'])
	->where('slug', '\w+')
	->name('news.show');





Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
