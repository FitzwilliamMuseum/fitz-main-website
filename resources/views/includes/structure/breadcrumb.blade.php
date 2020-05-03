<!-- Breadcrumb done by @sina-rzp -->

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL::to('/') }}">Home</a></li>


@php
  $bread = URL::to('/');
  $link = Request::path();
  $subs = explode("/", $link);
@endphp

@if (Request::path() != '/')

  @for($i = 0; $i < count($subs); $i++)

    @php
      $bread = $bread."/".$subs[$i];
      $title = urldecode($subs[$i]);
      $title = str_replace("-", " ", $title);
      $title = Str::title($title);
    @endphp

    <li class="breadcrumb-item active" aria-current="page"><a
      href="{{ $bread }}">{{ $title }}</a></li>



  @endfor

@endif
</ol>
</nav>
<!-- Breadcrumb done by @sina-rzp -->
