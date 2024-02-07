    {{-- related content --}}

    @php
        if(!empty($page['relevant_page_listing'])) {
            $pages_listing = $page['relevant_page_listing'];
        }
    @endphp
    @if(isset($pages_listing))
        <div class="container support-grid">
            <div class="row">
                @foreach($pages_listing as $card)
                    @php
                        $card = $card['landing_relevant_page_id']
                    @endphp
                    <div class="col-md-4 mb-3">
                        <div class="card card-fitz card-fitz-support h-100">
                            <a href="{{ $card['slug'] }}">
                                {{-- Check for preview image --}}
                                @if(!empty($card['preview_image']))
                                <img src="{{ $card['preview_image']['data']['url'] }}" alt="{{ isset($card['preview_image']['data']['description']) ? $card['preview_image']['data']['description'] : '' }}" class="card-img-top" width="374" height="342" loading="lazy">
                                {{-- If no preview, check for hero image --}}
                                @elseif(!empty($card['hero_image']))
                                    <img src="{{ $card['hero_image']['data']['url'] }}" alt="{{ isset($card['hero_image']['data']['description']) ? $card['hero_image']['data']['description'] : '' }}" class="card-img-top" width="374" height="342" loading="lazy">
                                {{-- Default --}}
                                @else
                                    <img class="card-img-top"
                                    src="https://fitz-content.studio24.dev/fitz-website/assets/Families 2.jpg?key=exhibition"
                                    alt="Families" width="374" height="342" loading="lazy">
                                @endif
                            </a>
                            <div class="card-body h-100">
                                <div class="contents-label mb-3">
                                    <h3>
                                        <a href="/{{ $card['slug'] }}" class="stretched-link">
                                            {{ $card['title'] }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
