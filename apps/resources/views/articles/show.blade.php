@extends('html')

@section('meta')
  @include('meta', [
    'title' => $article->title,
    'description' => $article->description,
    'twitter_card' => 'summary_large_image',
    'og_image' => url($article->thumbnail),
  ])
@endsection

@push('scripts')
  <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
@endpush

@section('content')
  <article class="articles-show">
    <div>
      <section>
        <div>{{ $article->date }}</div>
        <h2>{{ $article->title }}</h2>
        <div class="content">
          {!! $article->parsed_content !!}
        </div>
      </section>
    </div>
  </article>
@endsection