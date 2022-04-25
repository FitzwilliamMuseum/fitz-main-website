@section('ttn-actions')
<div class="container-fluid bg-pastel pt-3">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card card-fitz h-100">
                        <a href="{{ route('exhibition.ttn.labels') }}">
                            <img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/large_pd_132_1985_1_201808_adn21_dc2.jpg?key=directus-medium-crop"
                                 alt="Corot à son chevalet, Crècy-en-Brie"
                                 loading="lazy"/>
                        </a>
                    <div class="card-body h-100">
                        <div class="contents-label mb-3">
                            <h3>
                                <a href="{{ route('exhibition.ttn.labels') }}" class="stretched-link">
                                    Explore the labels
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card card-fitz h-100">
                    <a href="{{ route('exhibition.ttn.mapped') }}">
                        <img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/maptile.jpg?key=directus-medium-crop"
                             alt="Map of locations"
                             loading="lazy"/>
                    </a>
                    <div class="card-body h-100">
                        <div class="contents-label mb-3">
                            <h3>
                                <a href="{{ route('exhibition.ttn.mapped') }}" class="stretched-link">
                                    Explore a map of locations featured
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card card-fitz h-100">
                    <a href="{{ route('exhibition.ttn.artists') }}">
                        <img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/arton1565-032ab.jpeg?key=directus-medium-crop"
                             alt="Artists featured"
                             loading="lazy"/>
                    </a>
                    <div class="card-body h-100">
                        <div class="contents-label mb-3">
                            <h3>
                                <a href="{{ route('exhibition.ttn.artists') }}" class="stretched-link">
                                    Learn about the artists
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card card-fitz h-100">
                    <a href="{{ route('exhibition.ttn.viewpoints') }}">
                        <img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/large_pd_219_1994_1_201808_mfj22_dc2.jpeg?key=directus-medium-crop"
                             alt="Viewpoints"
                             loading="lazy"/>
                    </a>
                    <div class="card-body h-100">
                        <div class="contents-label mb-3">
                            <h3>
                                <a href="{{ route('exhibition.ttn.viewpoints') }}" class="stretched-link">
                                    Exhibition viewpoints
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>
@endsection
