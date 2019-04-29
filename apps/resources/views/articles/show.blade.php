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
  <script src="{{ url('/js/social-button.js') }}"></script>
@endpush

@push('styles')
  <link rel="stylesheet" href="{{ url('/css/social-button.css') }}" />
@endpush

@section('content')
  <article class="articles-show">
    <div>
      <div>{{ $article->date }}</div>
      <h1>{{ $article->title }}</h1>
      <div class="content">
        {!! $article->parsed_content !!}
        <div id="social"></div>
      </div>
      <h3>この記事の執筆者</h3>
      <div class="author">
        <picture>
          <source type="image/webp" srcset="{{ url('/storage/authors/images/hato6502.webp') }} 1x">
          <img src="{{ url('/storage/authors/images/hato6502.png') }}" alt="hato6502">
        </picture>
        <div>
          <h4>hato6502
            &emsp;<a href="https://twitter.com/bluehood_admin?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-screen-name="false" data-show-count="false">Follow @bluehood_admin</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            {{-- <a href="https://github.com/hato6502" target="_blank">GitHub</a> --}}
          </h4>
          <p>
            中学生の頃に 6502 という CPU からプログラミングの世界に没入しました。
            C/C++ で１から作ることも好きですが、最近は変化の激しい IT 業界を鑑みて Web 系にシフトしつつあります。
          </p>
        </div>
      </div>
    </div>
  </article>
@endsection