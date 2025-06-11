<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                <a class="card__link"
                    href="{{ route('exhibition-externals', $curator['associated_people_id']['slug']) }}">
                    {{ $curator['associated_people_id']['display_name'] }}
                </a>
            </h3>
            @isset($curator['associated_people_id']['associated_role'])
                <p class="text-black-50">
                    {{ $curator['associated_people_id']['associated_role'] }}
                </p>
            @endisset
        </div>
        <div class="l-frame l-frame--3-2 card__image">
            @isset($curator['associated_people_id']['profile_image'])
                <img src="{{ $curator['associated_people_id']['profile_image']['data']['thumbnails'][13]['url'] }}"
                    alt="" loading="lazy" />
            @else
                <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
            @endisset
        </div>
    </div>
</div>
