<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use cebe\markdown\Markdown;
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('updated_at', 'desc')->simplePaginate(12);
        return view('articles.index', compact('articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->date = Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->format('Y-m-d');
        $article->parsed_content = (new Markdown())->parse($article->content);
        return view('articles.show', compact('article'));
    }
}
