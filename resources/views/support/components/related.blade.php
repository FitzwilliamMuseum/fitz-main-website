    {{-- related content --}}

    @php
        if(!empty($page['suggested_pages_heading'])) {
            $suggested_pages_heading = $page['suggested_pages_heading'];
        }
        /**
         * Accidentally named the listing differently in the subpage
         * and landing page templates!
         *
         * To remove and stick to either pages_listing or page_listing
         * on both templates.
        **/
        if(!empty($page['pages_listing'])) {
            $pages_listing = $page['pages_listing'];
        } elseif(!empty($page['page_listing'])) {
            $pages_listing = $page['page_listing'];
        }
    @endphp

    <div class="container-fluid related">
        <div class="container related-container">
            <h2 class="related-title text-center">We thought you’d like</h2>
            <div class="related-grid">
                @if(isset($pages_listing))
                    @foreach($pages_listing as $card)
                        @php
                            $card = $card['page_id']
                        @endphp
                        <div class="card card-fitz related-card h-100">
                            <a href="{{ $card['slug'] }}">
                                @if(!empty($card['preview_image']))
                                <img src="{{ $card['preview_image']['data']['url'] }}" alt="{{ isset($card['preview_image']['data']['description']) ? $card['preview_image']['data']['description'] : '' }}" class="card-img-top">
                                @else
                                    <img class="card-img-top"
                                    src="https://fitz-content.studio24.dev/fitz-website/assets/Families 2.jpg?key=exhibition"
                                    alt="Families" width="374" height="342" loading="lazy">
                                @endif
                            </a>
                            <div class="card-body h-100">
                                <div class="contents-label mb-3">
                                    <h3>
                                        <a href="{{ $card['slug'] }}">{{ $card['title'] }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
