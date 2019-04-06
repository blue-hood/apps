<!doctype html>
<html>
  @yield('head')
  <body>
    @yield('content')

    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('scripts')
  </body>
</html>
