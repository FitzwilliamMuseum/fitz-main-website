<div class="col-md-4 mb-3" data-component="card">
    <div class="card card-fitz h-100">
        @isset($claim['image'])
            <img class="card-img-top"
                    src="{{ $claim['image']['data']['thumbnails'][13]['url']}}"
                    alt=""
                    width="{{ $claim['image']['data']['thumbnails'][13]['width'] }}"
                    height="{{ $claim['image']['data']['thumbnails'][13]['height'] }}"
                    loading="lazy"
            />
        @else
            <img class="card-img-top"
                    src="{{ env('MISSING_IMAGE_URL') }}"
                    alt=""
                    loading="lazy"
            />
        @endisset
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h2>
                    <a href="{{ route('about.spoliation.claim', $claim['priref']) }}" class="stretched-link">
                        {{ $claim['accession_number'] }}: {{ $claim['alt_text'] }}
                    </a>
                </h2>
                <p class="text-info">Call for information expires on: {{ $claim['expiry_date'] }}</p>
            </div>
        </div>
    </div>
</div>
