<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @isset($curator['associated_people_id']['profile_image'])
            <img class="card-img-top"
                    src="{{ $curator['associated_people_id']['profile_image']['data']['thumbnails'][13]['url']}}"
                    alt=""
                    width="{{ $curator['associated_people_id']['profile_image']['data']['thumbnails'][13]['width'] }}"
                    height="{{ $curator['associated_people_id']['profile_image']['data']['thumbnails'][13]['height'] }}"
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
                    <a href="{{ route('exhibition-externals', $curator['associated_people_id']['slug']) }}"
                       class="stretched-link">
                        {{ $curator['associated_people_id']['display_name'] }}
                    </a>
                </h2>
                @isset($curator['associated_people_id']['associated_role'])
                    <p class="text-black-50">
                        {{$curator['associated_people_id']['associated_role']}}
                    </p>
                @endisset
            </div>
        </div>
    </div>
</div>
