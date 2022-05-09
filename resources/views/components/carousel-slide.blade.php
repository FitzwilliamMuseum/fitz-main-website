<div class="carousel-item {{ $class }}">
    <div class="row">
        @foreach($slides as $slide)
            @if(array_key_exists('0',$slide))
                <div class="col-md-4 mb-3">
                    <div class="card">
                        @if($slugify)
                            <a href="{{ route($route, Str::slug($slide[0][$param],'-')) }}" class="stretched-link">
                                <img class="card-img-top" alt="{{$slide[0][$title]}}"
                                     src="{{ $slide[0][$imageObject]['data']['thumbnails'][13]['url'] }}">
                            </a>
                        @else
                            <a href="{{ route($route, $slide[0][$param]) }}" class="stretched-link">
                                <img class="card-img-top" alt="{{$slide[0][$title]}}"
                                     src="{{ $slide[0][$imageObject]['data']['thumbnails'][13]['url'] }}">
                            </a>
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">
                                @if($slugify)
                                    <a href="{{ route($route, Str::slug($slide[0][$param],'-')) }}"
                                       class="stretched-link">
                                        {{ ucfirst(str_replace('-',' ', $slide[0][$title])) }}
                                    </a>
                                @else
                                    <a href="{{ route($route, $slide[0][$param]) }}" class="stretched-link">
                                        {{ ucfirst(str_replace('-',' ', $slide[0][$title])) }}
                                    </a>
                                @endif
                            </h3>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-4 mb-3">
                    <div class="card">
                        @if($slugify)
                            <a href="{{ route($route, Str::slug($slide[$param],'-')) }}" class="stretched-link">
                                <img class="card-img-top" alt="{{$slide[$title]}}"
                                     src="{{ $slide[$imageObject]['data']['thumbnails'][13]['url'] }}">
                            </a>
                        @else
                            <a href="{{ route($route, $slide[$param]) }}" class="stretched-link">
                                <img class="card-img-top" alt="{{$slide[$title]}}"
                                     src="{{ $slide[$imageObject]['data']['thumbnails'][13]['url'] }}">

                            </a>
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">
                                @if($slugify)
                                    <a href="{{ route($route, Str::slug($slide[$param],'-')) }}" class="stretched-link">
                                        {{ ucfirst(str_replace('-',' ', $slide[$title])) }}
                                    </a>
                                @else
                                    <a href="{{ route($route, $slide[$param]) }}" class="stretched-link">
                                        {{ ucfirst(str_replace('-',' ', $slide[$title])) }}
                                    </a>
                                @endif
                            </h3>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
