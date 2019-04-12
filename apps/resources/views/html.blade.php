<!doctype html>
<html>
  @yield('head')
  <body>
    @include('nav')
    @yield('content')

    @include('footer')
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('scripts')
  </body>
</html>
