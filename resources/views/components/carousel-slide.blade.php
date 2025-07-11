<div class="carousel-item {{ $class }}">
    <div class="row">
        @foreach ($slides as $slide)
            @if (array_key_exists('0', $slide))
                <div class="col-md-4 mb-3">
                    <div class="card" data-component="card">
                        <div class="card__text">
                            <h3 class="card__heading">
                                <a class="card__link"
                                    href="{{ $slugify ? route($route, Str::slug($slide[0][$param], '-')) : route($route, $slide[0][$param]) }}">
                                    {{-- For Collection Context: patrons, donors, collectors card --}}
                                    @if (str_contains($slide[0][$title], 'patrons'))
                                        {{ ucfirst(str_replace('-', ',', $slide[0][$title])) }}
                                        {{-- For Italy 1400 - 1700 and Northern Europe 1400 - 1700 card --}}
                                    @elseif(str_contains($slide[0][$title], '1400'))
                                        {{ $slide[0][$title] }}
                                    @else
                                        {{ ucfirst(str_replace('-', ' ', $slide[0][$title])) }}
                                    @endif
                                </a>
                            </h3>
                        </div>
                        <div class="l-frame l-frame--3-2 card__image">
                            <img src="{{ $slide[0][$imageObject]['data']['thumbnails'][13]['url'] }}" alt=""
                                loading="lazy">
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-4 mb-3">
                    <div class="card" data-component="card">
                        <div class="card__text">
                            <h3 class="card__heading">
                                <a class="card__link"
                                    href="{{ $slugify ? route($route, Str::slug($slide[$param], '-')) : route($route, $slide[$param]) }}">
                                    {{ ucfirst(str_replace('-', ' ', $slide[$title])) }}
                                </a>
                            </h3>
                        </div>
                        <div class="l-frame l-frame--3-2 card__image">
                            <img src="{{ $slide[$imageObject]['data']['thumbnails'][13]['url'] }}" alt=""
                                loading="lazy">
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
