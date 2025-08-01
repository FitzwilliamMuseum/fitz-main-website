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
            <div class="row">
                @if(!empty($pages_listing))
                @foreach($pages_listing as $card)
                @php
                if(!empty($card['page_id'])) {
                    $card = $card['page_id'];
                }
                @endphp
                <div class="col-md-4 mb-3">
                    <div class="card" data-component="card">
                        <div class="l-box l-box--no-border card__text">
                            <h3 class="card__heading">
                                @if(!empty($card['slug']))
                                    @php
                                        // Initialise to support-us for now
                                        $url_prefix = 'support-us';
                                        // If it's got a parent page set, use that
                                        if(isset($card['parent_page'])) {
                                            $url_prefix = $card['parent_page']['slug'];
                                        } elseif(isset($card['exhibition_title'])) { // Check to see if it's an exhibition, if so use plan-your-visit/exhibitions/
                                            $url_prefix = "plan-your-visit/exhibitions";
                                        }
                                    @endphp
                                    <a href="/{{ $url_prefix }}/{{ $card['slug'] }}">
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
                        <div class="l-frame l-frame--3-2 card__image">
                            @if(!empty($card['preview_image']))
                                <img src="{{ $card['preview_image']['data']['thumbnails'][13]['url'] }}"
                                     alt=""
                                     loading="lazy" />
                            @elseif(!empty($card['hero_image']))
                                <img src="{{ $card['hero_image']['data']['thumbnails'][13]['url'] }}"
                                     alt=""
                                     loading="lazy" />
                            @else
                                <img src="https://fitz-content.studio24.dev/fitz-website/assets/Families 2.jpg?key=exhibition"
                                     alt=""
                                     loading="lazy" />
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
@endif
