<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreate;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$news = News::orderBy('id', 'desc')->paginate(5);
		return view('admin.news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreate $request)
    {
		$data = $request->validated();
		$data['slug'] = Str::slug($data['title']);
		$create = News::create($data);
		if ($create) {
			return redirect()->route('news.index')->with('success', 'Новость успешно добавлена');
		}

		return back()->with('fail', 'Не удалось добавить новость');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
		return view('admin.news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
		$request->validate([
			'title' => 'required'
		]);
		$data = $request->only(['title', 'author', 'description']);
		$data['slug'] = Str::slug($data['title']);

		$news->fill($data);
		if($news->save()) {
			return redirect()->route('news.index');
		}

		return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
    	$news->delete();
        return response()->json(['data' => 'delete']);
    }
}
