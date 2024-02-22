@php
    $breadcrumbs = [
        [
            'title' => 'Home',
            'url' => '/'
        ]
    ];

    if(!empty($parent_page)) {
        if(!empty($parent_page['title'])) {
            $parent_title = $parent_page['title'];
        }
        if(!empty($parent_page['slug'])) {
            $parent_slug = $parent_page['slug'];
        }
        array_push($breadcrumbs, 
            [
                'title' => !empty($parent_title) ? $parent_title : '',
                'url' => !empty($parent_slug) ? $parent_slug : '',
            ]);
    }

    if(!empty($page)) {
        if(!empty($page['title'])) {
            $page_title = $page['title'];
        }
        if(!empty($page['slug'])) {
            $page_slug = $page['slug'];
        }
        array_push($breadcrumbs, 
            [
                'title' => !empty($page_title) ? $page_title : '',
                'url' => !empty($page_slug) ? $page_slug : '',
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
