<a class="article-card" href="{{ route('articles.show', $article['id']) }}">
  @if(isset($article['thumbnail']))
    <picture>
      <source type="image/webp" srcset="{{ preg_replace("/(.*)\.(.*)/", "$1", $article['thumbnail']) }}.webp 1x">
      <img src="{{ $article['thumbnail'] }}" alt="{!! $article['title'] !!}">
    </picture>
  @endif

  <div>{{ $article['updated_at'] }}</div>
  <h3>{!! $article['title'] !!}</h3>
  <p>{{ $article['description'] }}</p>
</a>
