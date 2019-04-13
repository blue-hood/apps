@extends('html')

@section('head')
  @include('head', [
    'title' => '記事の編集',
    'description' => 'BlueHood Apps の記事を編集します。',
  ])
@endsection

@section('content')
  <article>
    <div>
          <section>
          <h2>記事の編集</h2>
          <p>ここに記事の編集フォームを CKEditor or CodeMirror で実装します。形式は html か md を予定。ファイルアップロードの機能も必要となります。</p>
          <ul>
            <li>CKEditor　非エンジニアでも編集可能。</li>
            <li>CodeMirror for md　中間。Qiita や GitHub で採用されている。</li>
            <li>CodeMirror for html　高度なこともできる。</li>
          </ul>
    </section>

    </div>
  </article>
@endsection