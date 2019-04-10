<!doctype html>
<html>
  @yield('head')
  <body>
    @include('nav')
    @yield('content')

    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('scripts')
  </body>
</html>
