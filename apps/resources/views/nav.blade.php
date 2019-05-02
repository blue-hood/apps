<nav>
  <div>
    <a href="{{ route('index') }}"><h1>BlueHood Apps</h1></a>
    <div class="nav-menu">
      {{--<a href="#">Apps</a>--}}
      <a href="{{ route('articles.index') }}">Articles</a>
      <a href="https://github.com/blue-hood" target="_blank">GitHub</a>
      <a href="https://twitter.com/bluehood_admin" target="_blank">Twitter</a>
      <a href="{{ url('blog/') }}">Blog</a>
    </div>
    <div class="hamburger-button">Menu</div>
  </div>
</nav>
