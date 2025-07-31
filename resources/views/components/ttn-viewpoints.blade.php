<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                @if (isset($viewpoint['display_id_number']))
                    {{ $viewpoint['display_id_number'] }}:
                @endif
                <a class="card__link" href="{{ route('exhibition.ttn.viewpoint', $viewpoint['id']) }}">
                    {{ $viewpoint['title'] }}
                </a>
            </h3>
            <p class="text-info">
                @foreach ($viewpoint['associated_people'] as $person)
                    {{ $person['associated_people_id']['display_name'] ?? 'Anon' }}<br />
                    @isset($person['associated_people_id']['associated_role'])
                        <span class="text-black-50">{{ $person['associated_people_id']['associated_role'] }}</span>
                    @endisset
                    @if (!$loop->last)
                        <br />
                    @endif
                @endforeach
            </p>
        </div>

        <div class="l-frame l-frame--3-2 card__image">
            @if (!empty($viewpoint['associated_artworks'][0]['ttn_labels_id']['image']))
                <img src="{{ $viewpoint['associated_artworks'][0]['ttn_labels_id']['image']['data']['thumbnails'][13]['url'] }}"
                    alt="" loading="lazy" />
            @else
                <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
            @endif
        </div>
    </div>
</div>
