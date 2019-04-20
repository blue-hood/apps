<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use cebe\markdown\Markdown;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::simplePaginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->edit();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->update($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article = null)
    {
        $action = normalize(is_null($article) ? route('articles.store'):route('articles.update', $article->id));
        $method = is_null($article) ? 'POST':'PUT';

        return view('articles.edit', compact('action', 'method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article = null)
    {
        $request->validate([
            'id' => 'required|unique:articles',
            'thumbnail' => 'required',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        $article = Article::firstOrNew(['id' => $request->id]);
        $article->thumbnail = $request->thumbnail;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->content = $request->content;
        $article->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
