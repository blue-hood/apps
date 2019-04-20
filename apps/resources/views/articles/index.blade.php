@extends('html')

@section('meta')
  @include('meta', [
    'title' => '記事一覧',
    'description' => 'BlueHood アプリの更新情報や、アプリ開発者のための技術情報をまとめています。',
  ])
@endsection

@section('content')
  <article>
    <div>
      <section>
        <h2>記事一覧</h2>
        @foreach ($articles as $article)
          {{ $article->title }}
        @endforeach

        {{ $articles->links() }}
      </section>
    </div>
  </article>
@endsection