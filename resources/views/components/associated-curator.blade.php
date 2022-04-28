<div class="col-md-4 mb-3">
{{--    @dd($curator['associated_people_id'])--}}
    <div class="card card-fitz h-100">
        @isset($curator['associated_people_id']['profile_image'])
            <a href="{{ route('exhibition-externals', $curator['associated_people_id']['slug']) }}">
                <img class="card-img-top" src="{{ $curator['associated_people_id']['profile_image']['data']['thumbnails'][2]['url']}}"
                     alt="A profile image of {{ $curator['associated_people_id']['display_name'] }}"
                     width="{{ $curator['associated_people_id']['profile_image']['data']['thumbnails'][2]['width'] }}"
                     loading="lazy"/>
            </a>
        @else
            <a href="{{ route('exhibition-externals', $curator['associated_people_id']['slug']) }}">
                <img class="card-img-top"
                     src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                     alt="A stand in image for {{ $curator['associated_people_id']['display_name'] }}"
                     loading="lazy"/>
            </a>
        @endisset
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h3>
                    <a href="{{ route('exhibition-externals', $curator['associated_people_id']['slug']) }}" class="stretched-link">
                        {{ $curator['associated_people_id']['display_name'] }}
                    </a>
                </h3>
                @isset($curator['associated_people_id']['associated_role'])
                <p class="text-black-50">
                    {{$curator['associated_people_id']['associated_role']}}
                </p>
                @endisset
            </div>
        </div>
    </div>
</div>
