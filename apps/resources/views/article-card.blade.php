<a class="article-card" href="{{ route('articles.show', $article['id']) }}">
  <picture>
    <source type="image/webp" srcset="{{ preg_replace("/(.*)\.(.*)/", "$1", $article['thumbnail']) }}.webp 1x">
    <img src="{{ $article['thumbnail'] }}" alt="{!! $article['title'] !!}">
  </picture>
  <div>{{ $article['updated_at'] }}</div>
  <h3>{!! $article['title'] !!}</h3>
  <p>{{ $article['description'] }}</p>
</a>
