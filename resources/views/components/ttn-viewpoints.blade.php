<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @if(!empty($viewpoint['associated_artworks'][0]['ttn_labels_id']['image']))
            <img class="card-img-top"
                    src="{{$viewpoint['associated_artworks'][0]['ttn_labels_id']['image']['data']['thumbnails'][13]['url']}}"
                    alt=""
                    width="{{ $viewpoint['associated_artworks'][0]['ttn_labels_id']['image']['data']['thumbnails'][13]['width'] }}"
                    height="{{ $viewpoint['associated_artworks'][0]['ttn_labels_id']['image']['data']['thumbnails'][13]['height'] }}"
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
                    @if(isset($viewpoint['display_id_number']))
                        {{ $viewpoint['display_id_number'] }}:
                    @endif
                    <a href="{{ route('exhibition.ttn.viewpoint', $viewpoint['id']) }}" class="stretched-link">
                        {{ $viewpoint['title'] }}
                    </a>
                </h2>
                <p class="text-info">
                    @foreach($viewpoint['associated_people'] as $person)
                        {{$person['associated_people_id']['display_name'] ?? 'Anon'}}<br/>
                        @isset($person['associated_people_id']['associated_role'])
                            <span class="text-black-50">{{$person['associated_people_id']['associated_role']}}</span>
                        @endisset
                        @if(end($viewpoint['associated_people']))
                            <br/>
                        @endif
                    @endforeach
                </p>

            </div>
        </div>
    </div>
</div>
