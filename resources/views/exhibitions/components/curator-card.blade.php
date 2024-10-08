<div class="card card-fitz related-card h-100" data-component="card">
    @if(!empty($curator['profile_image']))
        <img src="{{ $curator['profile_image']['data']['thumbnails'][13]['url'] }}" alt="{{ isset($curator['profile_image']['data']['description']) ? $curator['profile_image']['data']['description'] : '' }}" class="card-img-top">
    @else
        <img class="card-img-top"
        src="https://fitz-content.studio24.dev/fitz-website/assets/Families 2.jpg?key=exhibition"
        alt="Families" width="374" height="342" loading="lazy">
    @endif
    <div class="card-body h-100">
        <div class="contents-label mb-3">
            <h3>
                <a href="/{{ !empty($curator['curator_type_slug']) ? $curator['curator_type_slug'] : ''}}/{{ $curator['slug'] }}">{{ $curator['display_name'] }}</a>
            </h3>
            <p>{{ $curator['role'] }}</p>
        </div>
    </div>
</div>
