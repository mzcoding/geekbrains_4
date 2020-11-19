<?php

namespace App\Http\Controllers;

use App\Jobs\NewsParsing;
use App\Service\ParseService;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
	protected $urls = [
		'https://news.yandex.ru/music.rss',
		'https://news.yandex.ru/auto.rss',
		'https://news.yandex.ru/army.rss',
		'https://news.yandex.ru/games.rss',
		'https://news.yandex.ru/movies.rss',
		'https://news.yandex.ru/cosmos.rss',
		'https://news.yandex.ru/health.rss'
	];

    public function index()
	{

        foreach($this->urls as $url) {
        	NewsParsing::dispatch(new ParseService($url));
		}

        echo "Success";
	}
}
