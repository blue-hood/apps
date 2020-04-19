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
      <section>
        <h2>最近のアプリ</h2>
        <div class="article-list">
          <a class="article-card" href="https://kohsei-san.b-hood.site/" target="_blank" rel="noopener">
            <img width="128" height="128" src="https://kohsei-san.b-hood.site/favicon.png" alt="校正さん">
            <h3>校正さん</h3>
            <p>その場ですぐに文章を校正できるメモ帳アプリです。</p>
          </a>

          <a class="article-card" href="https://pencil.b-hood.site" target="_blank" rel="noopener">
            <picture>
              <source type="image/webp" srcset="/storage/apps/images/pencil.webp 1x">
              <img src="/storage/apps/images/pencil.png" alt="Hood Pencil">
            </picture>
            <h3>Hood Pencil</h3>
            <p>Twitter に直接投稿できる気軽なお絵かきサービスです。</p>
          </a>
        </div>
      </section>
      <section>        
        <h2>最近の記事</h2>
        @include('article-list', ['articles' => $recentArticles, 'adsRate' => 0.0])
      </section>
    </div>
  </article>
@endsection