@foreach ($data['data'] as $datum)
    <div class="col-md-4 mb-3">
        <div class="card" data-component="card">
            <div class="l-box l-box--no-border card__text">
                <h3 class="card__heading">
                    <a class="card__link" href="{{ $datum['url'] }}">{{ $datum['title'] }}</a>
                </h3>
                @isset($datum['sub_title'])
                    <p class="text-info">{{ $datum['sub_title'] }}</p>
                @endisset
            </div>
            <div class="l-frame l-frame--3-2 card__image">
                @if (!is_null($datum['hero_image']))
                    <img src="{{ $datum['hero_image']['data']['thumbnails'][13]['url'] }}"
                        alt="" loading="lazy" />
                @else
                    <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
                @endif
            </div>
        </div>
    </div>
@endforeach
