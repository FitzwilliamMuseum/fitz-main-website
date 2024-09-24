{{-- related content --}}
@php
    if (!empty($page['suggested_pages_heading'])) {
        $suggested_pages_heading = $page['suggested_pages_heading'];
    }
    if (!empty($page['related_page_listing'])) {
        $pages_listing = $page['related_page_listing'];
    }

    if(!str_contains(Request::url(), 'exhibition')) {
        $page_root = Request::url();
    }

    if(!empty($page['pages_listing'])) {
        $pages_listing = $page['pages_listing'];
    } elseif(!empty($page['page_listing'])) {
        $pages_listing = $page['page_listing'];
    }
@endphp

@if (!empty($pages_listing))
    <div class="container-fluid related">
        <div class="container related-container">
            @if (!empty($suggested_pages_heading))
                <h2 class="related-title text-center">{{ $suggested_pages_heading }}</h2>
            @endif
            <div class="related-grid">
                @foreach ($pages_listing as $card)
                    @php
                        if (str_contains(Request::url(), 'promo_pages')) {
                            $card = $card['subpage_id'];
                        }
                        $card = $card['page_id'];
                    @endphp
                    <div class="card card-fitz related-card h-100">
                        @if (!empty($card['preview_image']))
                            <img src="{{ $card['preview_image']['data']['thumbnails'][13]['url'] }}"
                                alt="{{ !empty($card['preview_image']['data']['description']) ? $card['preview_image']['data']['description'] : '' }}"
                                class="card-img-top">
                        @elseif (!empty($card['hero_image']))
                            <img src="{{ $card['hero_image']['data']['thumbnails'][13]['url'] }}"
                                alt="{{ !empty($card['hero_image']['data']['description']) ? $card['hero_image']['data']['description'] : '' }}"
                                class="card-img-top">
                        @endif
                        <div class="card-body h-100">
                            <div class="contents-label mb-3">
                                <h3>
                                    @if (!empty($card['slug']))
                                        <a href="/{{ $card['slug'] }}">
                                    @endif
                                    @if (!empty($card['title']))
                                        {{ $card['title'] }}
                                    @elseif (!empty($card['exhibition_title']))
                                        {{ $card['exhibition_title'] }}
                                    @endif
                                    @if (!empty($card['slug']))
                                        </a>
                                    @endif
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
