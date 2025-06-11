<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                <a class="card__link" href="{{ route('about.spoliation.claim', $claim['priref']) }}">
                    {{ $claim['accession_number'] }}: {{ $claim['alt_text'] }}
                </a>
            </h3>
            <p class="text-info">Call for information expires on: {{ $claim['expiry_date'] }}</p>
        </div>
        <div class="l-frame l-frame--3-2 card__image">
            @isset($claim['image'])
                <img src="{{ $claim['image']['data']['thumbnails'][13]['url'] }}" alt="" loading="lazy" />
            @else
                <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
            @endisset
        </div>
    </div>
</div>
