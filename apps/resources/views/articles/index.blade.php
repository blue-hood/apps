@extends('html')

@section('meta')
  @include('meta', [
    'title' => '記事一覧',
    'description' => 'BlueHood アプリの更新情報や、アプリ開発者のための技術情報をまとめています。',
  ])
@endsection

@section('content')
  <article class="articles-index">
    <div>
      <section>
        <h2>記事一覧</h2>

        <div class="list">
            @foreach ($articles as $article)
              <a class="content" href="{{ normalize(route('articles.show', $article->id)) }}">
                <img src="{{ $article->thumbnail }}" alt="{{ $article->title }}">
                <div>{{ $article->date }}</div>
                <h3>{{ $article->title }}</h3>
                <p>{{ $article->description }}</p>
              </a>
            @endforeach
        </div>

        {{ $articles->links() }}
      </section>
    </div>
  </article>
@endsection