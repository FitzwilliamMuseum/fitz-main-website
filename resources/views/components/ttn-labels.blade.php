<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @if(!empty($labels['image']))
            <img class="card-img-top" src="{{$labels['image']['data']['thumbnails'][13]['url']}}"
                    alt=""
                    width="{{ $labels['image']['data']['thumbnails'][13]['width'] }}"
                    height="{{ $labels['image']['data']['thumbnails'][13]['height'] }}"
                    loading="lazy"/>
        @else
            <img class="card-img-top"
                    src="{{ env('MISSING_IMAGE_URL') }}"
                    alt=""
                    loading="lazy"/>
        @endisset
        <div class="card-body h-100">
            <div class="contents-labels mb-3">
                <h2>
                    @if(isset($labels['display_id_number']))
                        {{ $labels['display_id_number'] }}:
                    @endif
                    <a href="{{ route('exhibition.ttn.label', $labels['slug']) }}" class="stretched-link">
                        {{ $labels['title'] }}
                    </a>
                </h2>
               <p class="text-info">
                   {{$labels['artist']['display_name'] ?? 'Anon'}}
               </p>
                <p class="text-black-50">
                    {{ $labels['institution'] ?? 'Private collection' }}
                </p>
            </div>
        </div>
    </div>
</div>
