<div class="col-md-4 mb-3" data-component="card">

    <div class="card card-fitz h-100">

        @if(!is_null($release['hero_image']))
            <img class="img-fluid" src="{{ $release['hero_image']['data']['thumbnails'][13]['url']}}"
                 width="{{ $release['hero_image']['data']['thumbnails'][13]['width'] }}"
                 height="{{ $release['hero_image']['data']['thumbnails'][13]['height'] }}"
                 alt="{{ $release['hero_image_alt_text'] }}" loading="lazy"
            />
        @endif
        <div class="card-body ">
            <div class="contents-label mb-3">
                <h2>
                    <a class="stretched-link" href="{{ $release['file']['data']['full_url'] }}">
                        {{ $release['title']}}
                    </a>
                </h2>
            </div>
            <p class="card-text">{{ substr(strip_tags(htmlspecialchars_decode($release['body'])),0,200) }}...</p>
            <p class="text-info">
                {{ Carbon\Carbon::parse($release['release_date'])->format('j F Y') }}
            </p>
            <p> @mime($release['file']['type']) - @humansize($release['file']['filesize'])</p>
            <a href="{{ $release['file']['data']['full_url'] }}" class="btn d-block btn-dark stretched-link">
                Download file
            </a>
        </div>
    </div>
</div>
