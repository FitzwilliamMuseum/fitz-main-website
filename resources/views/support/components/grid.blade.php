{{-- related content --}}

@php
    if (!empty($page['related_page_listing'])) {
        $pages_listing = $page['related_page_listing'];
    }

    $pages_listing_order = [];

    if (!empty($page['related_pages_order'])) {
        $custom_order = true;
        if (!empty($pages_listing)) {
            foreach ($page['related_pages_order'] as $page_order) {
                foreach ($pages_listing as $page_item) {
                    if ($page_order['page_id'] == $page_item['landing_relevant_page_id']['id']) {
                        $page_item['card_heading'] = $page_order['page_heading'];
                        array_push($pages_listing_order, $page_item);
                    }
                }
            }
        }
    }

    $page_root = Request::url();
@endphp
@if (!empty($pages_listing_order))
    <div class="container support-grid">
        <div class="row">
            @foreach ($pages_listing_order as $card)
                @php
                    $card = $card['landing_relevant_page_id'];
                @endphp
                <div class="col-md-4 mb-3">
                    <div class="card card-fitz card-fitz-support h-100" data-component="card">
                        <div>
                            {{-- Check for preview image --}}
                            @if (!empty($card['preview_image']))
                                <img src="{{ $card['preview_image']['data']['thumbnails'][13]['url'] }}"
                                    alt=""
                                    class="card-img-top-support" width="374" height="342" loading="lazy">
                                {{-- If no preview, check for hero image --}}
                            @elseif(!empty($card['hero_image']))
                                <img class="card-img-top-support"
                                    src="{{ $card['hero_image']['data']['thumbnails'][13]['url'] }}"
                                    alt="">
                                {{-- Default --}}
                            @else
                                <img class="card-img-top-support"
                                    src="https://fitz-content.studio24.dev/fitz-website/assets/Families 2.jpg?key=exhibition" alt="">
                            @endif
                        </div>
                        @if (!empty($card['title']))
                            <div class="card-body h-100">
                                <div class="contents-label mb-3">
                                    <h2>
                                        <a href="{{ $page_root }}/{{ $card['slug'] }}" class="stretched-link">
                                            {{ $card['title'] }}
                                        </a>
                                    </h2>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
