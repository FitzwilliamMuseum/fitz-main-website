<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                <a class="card__link" href="{{ $result['url'][0] }}">{{ $result['title'][0] }}</a>
            </h3>
            @isset($result['publication_date'][0])
                <p class="text-info">{{ Carbon\Carbon::parse($result['publication_date'][0])->format('j F Y') }}</p>
                @if (Carbon\Carbon::parse($result['publication_date'][0])->diffInDays() > 120)
                    <div class="alert alert-danger" role="alert">
                        Article over 4 months old.
                    </div>
                @endif
            @endisset
        </div>
        <div class="l-frame l-frame--3-2 card__image">
            @if (!is_null($result['smallimage']))
                <img src="{{ $result['smallimage'][0] }}" alt="" loading="lazy" />
            @else
                <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
            @endif
        </div>
    </div>
</div>
