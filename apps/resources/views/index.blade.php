@extends('html')

@section('meta')
  @include('meta', [
    'description' => 'BlueHood では人々の創作を支援するサービスをプロトタイピングし提供しています。',
  ])
@endsection

@section('content')
  <header>
    <div>
          <h1>
      <img src="{{ url('/images/bluehood.svg') }}" alt="BlueHood"><br>
      BlueHood では人々の創作を支援するアプリをプロトタイピングし提供しています。
    </h1>
    </div>
  </header>
  <article>
    <div>
      {{--<section>
        <h2>最近のアプリ</h2>
      </section>
      <section>        
        <h2>最近の記事</h2>
      </section>--}}
    </div>
  </article>
@endsection