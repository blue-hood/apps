@extends('html')

@section('meta')
  @include('meta', [
    'title' => '記事の編集',
    'description' => 'BlueHood Apps の記事を編集します。',
  ])
@endsection

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.45.0/codemirror.min.js" integrity="sha256-9a6VkdhEy67TOYPr0MCOeASoNMfBiifpuZsY7PzVHTg=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.45.0/mode/markdown/markdown.min.js" integrity="sha256-BZXkUzlSBobUXEiSFbDIbTc/DOqhNdegF/iK5m99kbk=" crossorigin="anonymous"></script>
  <script>
    const editor = CodeMirror.fromTextArea(document.querySelector('#content'), {
      mode:  'markdown',
      lineNumbers: true,
    });
  </script>
@endpush

@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.45.0/codemirror.min.css" integrity="sha256-I8NyGs4wjbMuBSUE40o55W6k6P7tu/7G28/JGUUYCIs=" crossorigin="anonymous" />
  <style>
    form table {
      width: 100%;
    }
    form table input {
      width: 100%;
    }
  </style>
@endpush

@section('content')
  <article>
    <div>
      <section>
        @if ($errors->any())
          <p>
            <div class="container-danger danger">
              @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
              @endforeach
            </div>
          </p>
        @endif

        <h2>記事の編集</h2>
        <form action="{{ $action }}" method="POST">
          {{ csrf_field() }}
          @method($method)
          <table>
            <tbody>
              <tr>
                <td>記事 ID</td>
                <td><input name="id" value="{{ old('id', $article->id) }}"></td>
              </tr>
              <tr>
                <td>サムネイル 公開パス</td>
                <td><input name="thumbnail" value="{{ old('thumbnail', $article->thumbnail) }}"></td>
              </tr>
              <tr>
                <td>タイトル</td>
                <td><input name="title" value="{{ old('title', $article->title) }}"></td>
              </tr>
              <tr>
                <td>説明文</td>
                <td><input name="description" value="{{ old('description', $article->description) }}"></td>
              </tr>
            </tbody>
          </table>
          <input class="button-primary" type="submit" value="保存">
          <textarea name="content" id="content">{{ old('content', $article->content) }}</textarea>
        </form>
      </section>
    </div>
  </article>
@endsection