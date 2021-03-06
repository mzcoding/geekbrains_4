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


Route::get('/', [\App\Http\Controllers\NewsController::class, 'index']);
Route::group(['middleware' => 'auth'], function() {
  Route::group(['prefix' => 'account'], function() {
		Route::get('/', [\App\Http\Controllers\Account\IndexController::class, 'index'])
			   ->name('account');
  });
  Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
   Route::resource('/news', \App\Http\Controllers\Admin\NewsController::class);
  });
});

//categories
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [\App\Http\Controllers\CategoryController::class, 'show'])
	->where('id', '\d+')
	->name('categories.show');
//news
Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [\App\Http\Controllers\NewsController::class, 'show'])
	//->where('slug', '\w+')
	->name('news.show');





Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/with', function() {
	$categories = \App\Models\Category::with('news')->get();
	dump($categories);
});

Route::get('/parser', [\App\Http\Controllers\ParserController::class, 'index']);

Route::group(['middleware' => 'guest'], function() {
	Route::get('login/vk', [\App\Http\Controllers\VkSocialite::class, 'redirectToProvider'])
		->name('vk.login');
	Route::get('login/vk/callback', [\App\Http\Controllers\VkSocialite::class, 'handleProviderCallback'])
		->name('vk.login.callback');
});