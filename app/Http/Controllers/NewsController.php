<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
	public function index()
	{
		return view('news.index', ['news' => $this->newsList]);
	}

	public function show(string $slug = 'test')
	{
		$name = null;
		return view('news.show', ['slug' => $slug, 'name' => $name]);
	}
}
