<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $categoryList = [
		[
			'title' => 'Спорт',
			'description' => 'Описание первой новости'
		],
		[
			'title' => 'Фильмы',
			'description' => 'Описание второй новости'
		],
		[
			'title' => 'Игры',
			'description' => 'Описание третей новости'
		],
	];
	protected $newsList = [
		[
			'slug' => 'one',
			'category_id' => 0,
			'title' => 'Первая новость',
			'description' => 'Описание первой новости'
		],
		[
			'slug' => 'two',
			'category_id' => 1,
			'title' => 'Вторая новость',
			'description' => 'Описание второй новости'
		],
		[
			'slug' => 'three',
			'category_id' => 1,
			'title' => '3 новость',
			'description' => 'Описание 3 новости'
		],
	];

}
