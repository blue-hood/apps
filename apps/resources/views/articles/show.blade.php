@extends('html')

@section('meta')
  @include('meta', [
    'title' => $article['meta']['title'],
    'description' => $article['meta']['description'],
    'twitter_card' => 'summary_large_image',
    'og_image' => url($article['meta']['thumbnail']),
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
  {{ Breadcrumbs::render('articles.show', $article) }}
  <article class="articles-show">
    <div>
      <div>
        {{ $article['meta']['updated_at'] }}
        &emsp;
        <a href="https://github.com/blue-hood/apps-articles/commits/master/{{ $article['meta']['id'] }}/index.md" target="_blank" rel="noopener">{{ $article['meta']['hash'] }}</a>
      </div>
      <h1>{{ $article['meta']['title'] }}</h1>
      <div class="content">
        {!! $article['html'] !!}

        <div id="social"></div>

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- ディスプレイ広告 -->
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-7008780049786244"
            data-ad-slot="5063315418"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
      </div>

      <h3>この記事の執筆者</h3>
      <div class="author">
        <picture>
          <source type="image/webp" srcset="{{ url('/storage/authors/images/hato6502.webp') }} 1x">
          <img src="{{ url('/storage/authors/images/hato6502.png') }}" alt="hato6502">
        </picture>
        <div>
          <h4>Hata
            &emsp;<a href="https://twitter.com/bluehood_admin?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-screen-name="false" data-show-count="false">Follow @bluehood_admin</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            {{-- <a href="https://github.com/hato6502" target="_blank">GitHub</a> --}}
          </h4>
          <p>
            中学生の頃に 6502 という CPU からプログラミングの世界に入りました。
            C/C++ で1から作ることも好きですが、最近は Web 系にシフトしつつあります。
          </p>
        </div>
      </div>
    </div>
  </article>
@endsection