<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @isset($claim['image'])
            <a href="{{ route('about.spoliation.claim', $claim['priref']) }}">
                <img class="card-img-top" src="{{ $claim['image']['data']['thumbnails'][2]['url']}}"
                     alt="{{ $claim['alt_text'] }}"
                     width="{{ $claim['image']['data']['thumbnails'][2]['width'] }}"
                     loading="lazy"/>
            </a>
        @else
            <a href="{{ route('about.spoliation.claim', $claim['priref']) }}">
                <img class="card-img-top"
                     src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                     alt="A stand in image for {{ $claim['accession_number'] }}"
                     loading="lazy"/>
            </a>
        @endisset
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h3>
                    <a href="{{ route('about.spoliation.claim', $claim['priref']) }}" class="stretched-link">
                        {{ $claim['accession_number'] }}: {{ $claim['alt_text'] }}
                    </a>
                </h3>
                <p class="text-info">Call for information expires on: {{ $claim['expiry_date'] }}</p>
            </div>
        </div>
    </div>
</div>
