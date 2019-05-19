<!doctype html>
<html>
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106651880-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-106651880-2');
    </script>

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-7008780049786244",
        enable_page_level_ads: true
      });
    </script>

    @yield('meta')
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @stack('styles')
  </head>
  <body>
    @include('nav')
    @yield('content')

    @include('footer')
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('scripts')
  </body>
</html>
