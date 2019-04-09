@extends('html')

@section('head')
  @include('head', [
    'description' => 'BlueHood では人々の創作を支援するサービスをプロトタイピングし提供しています。',
  ])
@endsection

@section('content')
{{ print_r(request()->input(), true) }}
<a href="{{ route('index').'?a=1&b=2&c=3' }}">GET a=1, b=2, c=3</a>
@endsection