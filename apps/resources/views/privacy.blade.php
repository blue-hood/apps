@extends('html')

@section('meta')
  @include('meta', [
    'title' => 'プライバシーポリシー',
    'description' => 'Hood のプライバシーポリシーを掲載しています。',
  ])
@endsection

@section('content')
  <article class="privacy">
    <div>
      <h1>プライバシーポリシー</h1>
      <picture>
        <source type="image/webp" srcset="/images/ff333141.webp 1x,/images/c6ef52aa.webp 2x">
        <img src="/images/ff333141.jpg" srcset="/images/c6ef52aa.jpg 2x">
      </picture>
      <section>
        <h2>広告の配信について</h2>
        <p>当サイトは第三者配信の広告サービス「Google Adsense グーグルアドセンス」を利用しています。
        広告配信事業者は、ユーザーの興味に応じた広告を表示するためにCookie（クッキー）を使用することがあります。
        Cookie（クッキー）を無効にする設定およびGoogleアドセンスに関する詳細は<a href="https://policies.google.com/technologies/ads?hl=ja" target="_blank">こちら</a>をご覧ください。</p>

        <h2>アクセス解析ツールについて</h2>
        <p>当サイトでは、Googleによるアクセス解析ツール「Googleアナリティクス」を利用しています。
        このGoogleアナリティクスはトラフィックデータの収集のためにCookieを使用しています。
        このトラフィックデータは匿名で収集されており、個人を特定するものではありません。
        この機能はCookieを無効にすることで収集を拒否することが出来ますので、お使いのブラウザの設定をご確認ください。
        この規約に関して、詳しくは<a href="https://www.google.com/analytics/terms/jp.html" target="_blank">こちら</a>をご覧ください。</p>

        <h2>免責事項</h2>
        <p>当サイトで掲載している画像の著作権・肖像権等は各権利所有者に帰属致します。
        当サイトからリンクやバナーなどによって他のサイトに移動された場合、移動先サイトで提供される情報、サービス等について一切の責任を負いません。
        当サイトのコンテンツ・情報につきまして、可能な限り正確な情報を掲載するよう努めておりますが、誤情報が入り込んだり、情報が古くなっていることもございます。
        当サイトに掲載された内容によって生じた損害等の一切の責任を負いかねますのでご了承ください。</p>
      </section>
    </div>
  </article>
@endsection