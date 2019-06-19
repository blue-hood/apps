<div class="article-list">
  @foreach ($articles as $article)
    @include ('article-card', $article)

    @if ((rand()/(getrandmax() + 1)) < $adsRate)
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <ins class="adsbygoogle"
          style="display:block; width: 280px; margin: 1rem; "
          data-ad-format="fluid"
          data-ad-layout-key="-6a+bw-1-1b+ir"
          data-ad-client="ca-pub-7008780049786244"
          data-ad-slot="6043432586"></ins>
      <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    @endif
  @endforeach
</div>
