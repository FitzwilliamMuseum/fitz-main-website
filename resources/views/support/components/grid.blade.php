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
                    <div class="card card-fitz card-fitz-support" data-component="card">
                        <div class="l-box l-box--no-border card__text">
                            <h3 class="card__heading">
                                <a class="card__link" href="{{ $page_root }}/{{ $card['slug'] }}">
                                    {{ $card['title'] }}
                                </a>
                            </h3>
                        </div>
                        <div class="l-frame l-frame--3-2 card__image">
                            {{-- Check for preview image --}}
                            @if (!empty($card['preview_image']))
                                <img src="{{ $card['preview_image']['data']['thumbnails'][13]['url'] }}" alt=""
                                    loading="lazy">
                                {{-- If no preview, check for hero image --}}
                            @elseif(!empty($card['hero_image']))
                                <img src="{{ $card['hero_image']['data']['thumbnails'][13]['url'] }}" alt=""
                                    loading="lazy">
                                {{-- Default --}}
                            @else
                                <img src="https://fitz-content.studio24.dev/fitz-website/assets/Families 2.jpg?key=exhibition"
                                    alt="" loading="lazy">
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
