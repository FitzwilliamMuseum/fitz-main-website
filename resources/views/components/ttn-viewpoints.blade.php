<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @if(!empty($viewpoint['associated_artworks'][0]['ttn_labels_id']['image']))
            <a href="{{ route('exhibition.ttn.viewpoint', $viewpoint['id']) }}">
                <img class="card-img-top" src="{{$viewpoint['associated_artworks'][0]['ttn_labels_id']['image']['data']['thumbnails'][2]['url']}}"
                     alt="{{ $viewpoint['associated_artworks'][0]['ttn_labels_id']['alt_text'] }}"
                     width="{{ $viewpoint['associated_artworks'][0]['ttn_labels_id']['image']['data']['thumbnails'][2]['width'] }}"
                     loading="lazy"/>
            </a>
        @else
            <a href="{{ route('exhibition.ttn.viewpoint', $viewpoint['id']) }}">
                <img class="card-img-top"
                     src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                     alt="A stand in image for {{ $viewpoint['title'] }}"
                     loading="lazy"/>
            </a>
        @endisset
        <div class="card-body h-100">
            <div class="contents-labels mb-3">
                <h3>
                    @if(isset($viewpoint['display_id_number']))
                        {{ $viewpoint['display_id_number'] }}:
                    @endif
                    <a href="{{ route('exhibition.ttn.viewpoint', $viewpoint['id']) }}" class="stretched-link">
                        {{ $viewpoint['title'] }}
                    </a>
                </h3>
                <p class="text-info">
{{--                    @dd($viewpoint)--}}
                    @foreach($viewpoint['associated_people'] as $person)
                    {{$person['associated_people_id']['display_name'] ?? 'Anon'}}<br/>
                    @endforeach
                </p>

            </div>
        </div>
    </div>
</div>

