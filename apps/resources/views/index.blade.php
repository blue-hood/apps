@extends('html')

@section('meta')
  @include('meta', [
    'description' => 'Hood では人々の創作を支援するアプリをプロトタイピングし提供することが目標です。',
  ])
@endsection

@section('content')
  {{-- Breadcrumbs::render('index') --}}
  <header>
    <div>
      <h1>
        <img src="{{ url('/images/bluehood.svg') }}" alt="Hood"><br>
        Hood では人々の創作を支援するアプリをプロトタイピングし提供することが目標です。
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
        @include('article-list', ['articles' => $recentArticles])
      </section>
    </div>
  </article>
@endsection