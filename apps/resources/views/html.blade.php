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
    @yield('meta')
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @stack('styles')
  </head>
  <body>
    @include('nav')
    @yield('content')

    @include('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.4.3/polyfill.min.js" integrity="sha256-N5hPfGjaJETKmtvRlOjfHrSds0mzHkUJ80Rcxs3VCxQ=" crossorigin="anonymous"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('scripts')
  </body>
</html>
