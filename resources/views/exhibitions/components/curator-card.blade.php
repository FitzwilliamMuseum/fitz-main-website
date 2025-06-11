<div class="card" data-component="card">
    <div class="l-box l-box--no-border card__text">
        <h3 class="card__heading">
            <a class="card__link"
                href="/{{ !empty($curator['curator_type_slug']) ? $curator['curator_type_slug'] : '' }}/{{ $curator['slug'] }}">
                {{ $curator['display_name'] }}
            </a>
        </h3>
        <p class="text-info">{{ $curator['role'] }}</p>
    </div>
    <div class="l-frame l-frame--3-2 card__image">
        @if (!empty($curator['profile_image']))
            <img src="{{ $curator['profile_image']['data']['thumbnails'][13]['url'] }}" alt="" loading="lazy" />
        @else
            <img src="https://fitz-content.studio24.dev/fitz-website/assets/Families 2.jpg?key=exhibition"
                alt="" loading="lazy" />
        @endif
    </div>
</div>
