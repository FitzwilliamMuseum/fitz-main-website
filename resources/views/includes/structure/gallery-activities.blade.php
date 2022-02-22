@section('content')
    <div class="container">
        <h2>Gallery activities for families</h2>
        <div class="row">
            @foreach($activities['data'] as $resource)
                <div class="col-md-4 mb-3">
                    <div class="card  h-100">
                        @if(!is_null($resource['hero_image']))
                            <a href=" {{ $resource['activity_gdoc_link'] }}"><img class="img-fluid"
                                                                                  src="{{ $resource['hero_image']['data']['thumbnails'][4]['url']}}"
                                                                                  alt="A highlight image for {{ $resource['title'] }}"
                                                                                  width="{{ $resource['hero_image']['data']['thumbnails'][4]['width'] }}"
                                                                                  height="{{ $resource['hero_image']['data']['thumbnails'][4]['height'] }}"
                                                                                  loading="lazy"/></a>
                        @endif
                        <div class="card-body h-100">
                            <div class="contents-label mb-3">
                                <h3>
                                    <a class="stretched-link"
                                       href="{{ $resource['activity_gdoc_link'] }}">{{ $resource['title'] }}</a>
                                </h3>
                                <p class="text-info">For children from the age of {{ $resource['age_group']  }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
