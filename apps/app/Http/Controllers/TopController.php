<?php

namespace App\Http\Controllers;

use App\Article;

class TopController extends Controller
{
    public function index()
    {
        $recentArticles = array_slice(Article::getMetas(), 0, 3);
        return view('index', compact('recentArticles'));
    }

    public function privacy()
    {
        return view('privacy');
    }
}
