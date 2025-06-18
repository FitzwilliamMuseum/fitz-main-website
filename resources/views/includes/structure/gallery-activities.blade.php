@section('content')
    <div class="container">
        <h2>Gallery activities for families</h2>
        <div class="row">
            @foreach($activities['data'] as $resource)
                <div class="col-md-4 mb-3">
                    <div class="card" data-component="card">
                        <div class="l-box l-box--no-border card__text">
                            <h3 class="card__heading">
                                <a class="card__link" href="{{ $resource['activity_gdoc_link'] }}">
                                    {{ $resource['title'] }}
                                </a>
                            </h3>
                            <p class="text-info">For children from the age of {{ $resource['age_group'] }}</p>
                        </div>
                        <div class="l-frame l-frame--3-2 card__image">
                            @if(!is_null($resource['hero_image']))
                                <img src="{{ $resource['hero_image']['data']['thumbnails'][13]['url']}}"
                                     alt=""
                                     loading="lazy" />
                            @else
                                <img src="{{ env('MISSING_IMAGE_URL') }}"
                                     alt=""
                                     loading="lazy" />
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
