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
        $articles = Article::simplePaginate(10);
        foreach ($articles as &$article) {
            $article->date = Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->format('Y-m-d');
        }
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
        $article->date = Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->format('Y-m-d');
        $article->parsed_content = (new Markdown())->parse($article->content);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article = null)
    {
        $action = normalize(is_null($article) ? route('articles.store') : route('articles.update', $article->id));
        $method = is_null($article) ? 'POST' : 'PUT';

        if (is_null($article)) {
            $article = new Article();
        }

        return view('articles.edit', compact('action', 'method', 'article'));
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
        $validationList = [
            'id' => 'required',
            'thumbnail' => 'required',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required'
        ];
        if (is_null($article)) {
            $validationList['id'] .= '|unique:articles';
        }
        $request->validate($validationList);

        $newArticle = Article::firstOrNew(['id' => $request->id]);
        $newArticle->thumbnail = $request->thumbnail;
        $newArticle->title = $request->title;
        $newArticle->description = $request->description;
        $newArticle->content = $request->content;
        $newArticle->save();

        if (!is_null($article) && $article->id !== $newArticle->id) {
            $article->delete();
        }

        return redirect(normalize(route('articles.show', $newArticle->id)));
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
