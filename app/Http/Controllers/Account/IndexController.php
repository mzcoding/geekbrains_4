<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
	{
		echo "Добро пожаловать, " . \Auth::user()->name;
	}
}
