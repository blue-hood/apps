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
        <h3>この記事の執筆者</h3>
        <div class="author">
          <img src="{{ url('/storage/authors/images/hato6502.png') }}" alt="hato6502">
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
      </section>
    </div>
  </article>
@endsection