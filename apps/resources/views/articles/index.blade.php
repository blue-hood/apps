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
              <a class="content" href="{{ route('articles.show', $article->id) }}">
                <picture>
                  <source type="image/webp" srcset="{{ preg_replace("/(.*)\.(.*)/", "$1", $article->thumbnail) }}.webp 1x">
                  <img src="{{ $article->thumbnail }}" alt="{{ $article->title }}">
                </picture>
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