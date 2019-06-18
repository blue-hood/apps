@extends('html')

@section('meta')
  @include('meta', [
    'title' => '記事一覧',
    'description' => 'Hood アプリの更新情報や、アプリ開発者のための技術情報をまとめています。',
  ])
@endsection

@section('content')
  {{ Breadcrumbs::render('articles.index') }}
  <article>
    <div>
      <section>
        <h2>記事一覧</h2>
        @include('article-list', ['articles' => $articles])
        {{ $articles->links() }}
      </section>
    </div>
  </article>
@endsection