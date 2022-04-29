<!-- Breadcrumb done by @sina-rzp -->

<nav aria-label="breadcrumb">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Home</a></li>
        @php
            $bread = URL::to('/');
            $link = Request::path();
            $subs = explode("/", $link)
        @endphp
        @if (Request::path() != '/')
            @for($i = 0; $i < count($subs); $i++)
                @php
                    $bread = $bread."/".$subs[$i];
                    $title = urldecode($subs[$i]);
                    $title = str_replace("-", " ", $title);
                    $title = ucwords($title)
                @endphp
                <li class="breadcrumb-item active" aria-current="page"><a
                        href="{{ $bread }}">{{ $title }}</a></li>
            @endfor
        @endif
    </ol>
</nav>
