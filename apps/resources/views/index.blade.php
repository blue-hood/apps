@extends('html')

@section('meta')
  @include('meta', [
    'description' => 'アプリのプロトタイピングと記事。',
  ])
@endsection

@section('content')
  {{-- Breadcrumbs::render('index') --}}
  <header>
    <div>
      <h1>
        <img src="{{ url('/images/bluehood.svg') }}" alt="Hood"><br>
        アプリのプロトタイピングと記事。
      </h1>
    </div>
  </header>
  <article>
    <div>
      {{--<section>
        <h2>最近のアプリ</h2>
      </section>--}}
      <section>        
        <h2>最近の記事</h2>
        @include('article-list', ['articles' => $recentArticles, 'adsRate' => 0.0])
      </section>
    </div>
  </article>
@endsection