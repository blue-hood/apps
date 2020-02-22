<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::getMetas();
        $articles = new LengthAwarePaginator($articles, count($articles), 15);
        return view('articles.index', compact('articles'));
    }

    public function show(string $id)
    {
        $article = Article::get($id);
        return view('articles.show', compact('article'));
    }
}
