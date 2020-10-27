<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index()
  {
  	return view('categories.index', ['categories' => $this->categoryList]);
  }

	/**
	 * @param int $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
  public function show(int $id)
  {
  	 $newsList = [];
  	 foreach($this->newsList as $news) {
  	 	 if(is_array($news)) {
  	 	 	 if(isset($news['category_id']) && intval($news['category_id']) === $id) {
  	 	 	 	$newsList[] = $news;
			 }
		 }
	 }

  	 return view('categories.show', ['news' => $newsList]);
  }
}
