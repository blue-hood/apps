@php
  $canonical = normalize(url()->full());   
@endphp

<head>
  {{-- Google アナリティクス --}}

  <meta charset="utf-8">
  <title>@if(isset($title)){{ $title }} - @endif{{ config('app.name') }}</title>
  @if(isset($description)) <meta property="description" content="{{ $description }}"> @endif
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="mediumslateblue">
  @if(isset($robots)) <meta name="robots" content="{{ $robots }}"> @endif

  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@bluehood_admin">
  <meta property="og:url" content="{{ $canonical }}">
  @if(isset($title)) <meta property="og:title" content="{{ $title }}"> @endif
  @if(isset($description)) <meta property="og:description" content="{{ $description }}"> @endif
  <meta property="og:image" content="{{ url('/images/og.png') }}">

  <link rel="canonical" href="{{ $canonical }}">
  <link rel="icon" href="{{ url('/images/favicon@32px.png') }}" sizes="32x32">
  <link rel="icon" href="{{ url('/images/favicon@192px.png') }}" sizes="192x192">
  {{--<link rel="prev" href="前のページのURL">
  <link rel="next" href="次のページのURL">--}}

  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  @stack('styles')
</head>
