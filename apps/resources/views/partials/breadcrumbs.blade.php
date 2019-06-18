@if (isset($breadcrumbs))
  <ol class="breadcrumb">
    <div>
      @foreach ($breadcrumbs as $breadcrumb)
        <li class="breadcrumb-item">
          @if ($loop->last)
            {{ $breadcrumb->title }}
          @else
            <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
          @endif
        </li>
      @endforeach
    </div>
  </ol>
@endif