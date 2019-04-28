@extends('html')

@section('meta')
  @include('meta', [
    'title' => 'そのページは見つかりません'
  ])
@endsection

@section('content')
  <div class="not-found">
    <div>
      <h1><img src="{{ url('/images/banwolf.svg') }}" alt="BanWolf"><br>そのページは見つかりません。</h1>
    </div>
  </div>
@endsection