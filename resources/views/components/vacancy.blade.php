<div class="col-md-4 mb-3">
    <div class="card  card-fitz h-100">
        @if(!is_null($vacancy['hero_image']))
            <a href="{{ route('vacancy', $vacancy['slug'])}}">
                <img class="img-fluid"
                     src="{{ $vacancy['hero_image']['data']['thumbnails'][13]['url']}}"
                     alt="A highlight image for {{ $vacancy['hero_image_alt_text'] }}"
                     height="{{ $vacancy['hero_image']['data']['thumbnails'][13]['height'] }}"
                     width="{{ $vacancy['hero_image']['data']['thumbnails'][13]['width'] }}"
                     loading="lazy"/>
            </a>
        @endif
        @if(Carbon\Carbon::parse($vacancy['expires'])->endOfDay()->isPast())
            @include('includes.structure.jobexpired')
        @endif
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h2>
                    <a href="{{ route('vacancy', $vacancy['slug'])}}">{{ $vacancy['job_title']}}</a>
                </h2>
                <p class="text-info">Closing
                    Date: {{ Carbon\Carbon::parse($vacancy['expires'])->format('j F Y') }}</p>
                @if(isset($vacancy['salary_range']))
                    <span class="badge bg-dark">&pound;{{ $vacancy['salary_range'] }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
