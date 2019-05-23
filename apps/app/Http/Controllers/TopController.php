<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class TopController extends Controller
{
    public function index()
    {
        $recent_articles = Article::orderBy('updated_at', 'desc')
            ->take(3)
            ->get();
        return view('index', compact('recent_articles'));
    }
}
