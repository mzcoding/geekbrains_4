<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index()
  {
  	$categories = Category::paginate(3);

  	return view('categories.index', ['categories' => $categories]);
  }

	/**
	 * @param int $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
	 */
  public function show(int $id)
  {

  	 $category = Category::find($id);
  	 if(!$category) {
  	 	 return abort(404);
	 }

  	 $newsList = $category->news()->paginate(1);
  	 return view('categories.show', ['newsList' => $newsList]);
  }
}
