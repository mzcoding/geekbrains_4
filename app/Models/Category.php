<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $primaryKey = "id";

    public function news()
	{
		return $this->belongsToMany(News::class, 'categories_has_news', 'category_id',
			'news_id');
	}
}
