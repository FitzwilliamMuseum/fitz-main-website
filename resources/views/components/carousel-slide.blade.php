<div class="carousel-item {{ $class }}">
    <div class="row">
        @foreach($slides as $slide)
            @if(array_key_exists('0',$slide))
                <div class="col-md-4 mb-3">
                    <div class="card" data-component="card">
                        @if($slugify)
                            <a href="{{ route($route, Str::slug($slide[0][$param],'-')) }}" class="stretched-link">
                                <img class="card-img-top"
                                     alt=""
                                     src="{{ $slide[0][$imageObject]['data']['thumbnails'][13]['url'] }}"
                                />
                            </a>
                        @else
                            <a href="{{ route($route, $slide[0][$param]) }}" class="stretched-link">
                                <img class="card-img-top"
                                     alt=""
                                     src="{{ $slide[0][$imageObject]['data']['thumbnails'][13]['url'] }}"
                                />
                            </a>
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">
                                @if($slugify)
                                    <a href="{{ route($route, Str::slug($slide[0][$param],'-')) }}"
                                       class="stretched-link">
                                       {{-- For Collection Context: patrons, donors, collectors card --}}
                                       @if(str_contains($slide[0][$title], 'patrons'))
                                           {{ ucfirst(str_replace('-',',', $slide[0][$title])) }}
                                           {{-- For Italy 1400 - 1700 and Northern Europe 1400 - 1700 card --}}
                                           @elseif(str_contains($slide[0][$title], '1400'))
                                           {{ $slide[0][$title] }}
                                           @else
                                           {{ ucfirst(str_replace('-',' ', $slide[0][$title])) }}
                                       @endif
                                    </a>
                                @else
                                    <a href="{{ route($route, $slide[0][$param]) }}" class="stretched-link">
                                        {{-- For Collection Context: patrons, donors, collectors card --}}
                                        @if(str_contains($slide[0][$title], 'patrons'))
                                            {{ ucfirst(str_replace('-',', ', $slide[0][$title])) }}
                                            {{-- For Italy 1400 - 1700 and Northern Europe 1400 - 1700 card --}}
                                            @elseif(str_contains($slide[0][$title], '1400'))
                                            {{ $slide[0][$title] }}
                                            @else
                                            {{ ucfirst(str_replace('-',' ', $slide[0][$title])) }}
                                        @endif
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
                                <img class="card-img-top" alt=""
                                     src="{{ $slide[$imageObject]['data']['thumbnails'][13]['url'] }}"
                                />
                            </a>
                        @else
                            <a href="{{ route($route, $slide[$param]) }}" class="stretched-link">
                                <img class="card-img-top" alt=""
                                     src="{{ $slide[$imageObject]['data']['thumbnails'][13]['url'] }}"
                                />
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
