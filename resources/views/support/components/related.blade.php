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

@if(!empty($pages_listing))
    <div class="related">
        <div class="container related-container">
            @if(!empty($suggested_pages_heading))
            <h2 class="related-title text-center">{{ $suggested_pages_heading }}</h2>
            @endif
            <div class="related-grid">
                @if(!empty($pages_listing))
                @foreach($pages_listing as $card)
                @php
                if(!empty($card['page_id'])) {
                    $card = $card['page_id'];
                }
                @endphp
                <div class="card card-fitz related-card h-100" data-component="card">
                        @if(!empty($card['preview_image']))
                            <img src="{{ $card['preview_image']['data']['thumbnails'][13]['url'] }}"
                                alt="{{ !empty($card['preview_image']['data']['description']) ? $card['preview_image']['data']['description'] : '' }}"
                                class="card-img-top">
                        @elseif(!empty($card['hero_image']))
                            <img src="{{ $card['hero_image']['data']['thumbnails'][13]['url'] }}"
                                alt="{{ !empty($card['hero_image']['data']['description']) ? $card['hero_image']['data']['description'] : '' }}"
                                class="card-img-top">
                        @else
                            <img class="card-img-top"
                                src="https://fitz-content.studio24.dev/fitz-website/assets/Families 2.jpg?key=exhibition"
                                alt="Families" width="374" height="342" loading="lazy">
                        @endif
                    <div class="card-body h-100">
                        <div class="contents-label mb-3">
                            <h3>
                                @if(!empty($card['slug']))
                                    @php
                                        if(isset($card['parent_page'])) {
                                            $parent_page = $card['parent_page'];
                                        }
                                    @endphp
                                    <a href="/{{ (isset($card['parent_page']) && $parent_page != null) ? $parent_page['slug'] : 'support-us' }}/{{ $card['slug'] }}">
                                    @endif
                                    @if(!empty($card['title']))
                                        {{ $card['title'] }}
                                    @elseif(!empty($card['exhibition_title']))
                                        {{ $card['exhibition_title'] }}
                                    @endif
                                @if(!empty($card['slug']))
                                </a>
                                @endif
                            </h3>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
@endif
