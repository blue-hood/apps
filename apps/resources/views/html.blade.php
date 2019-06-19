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
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('scripts')
  </body>
</html>
