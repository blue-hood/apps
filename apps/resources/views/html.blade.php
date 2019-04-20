<!doctype html>
<html>
  <head>
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
