@php
    $breadcrumbs = [
        [
            'title' => 'Home',
            'url' => '/'
        ]
    ];

    if(!empty($parent_page)) {
        array_push($breadcrumbs, 
            [
                'title' => $parent_page['title'],
                'url' => $parent_page['slug'],
            ]);
    }

    if(!empty($page)) {
        array_push($breadcrumbs, 
            [
                'title' => $page['title'],
                'url' => $page['slug'],
            ]);
    }
@endphp
@if(!empty($breadcrumbs))
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb['url'] && !$loop->last)
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['title'] }}</li>
                @endif

            @endforeach
        </ol>
    </nav>
@endif
