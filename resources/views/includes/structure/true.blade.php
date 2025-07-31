@section('ttn-actions')
<div class="container-fluid bg-pastel pt-3">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card" data-component="card">
                    <div class="l-box l-box--no-border card__text">
                        <h3 class="card__heading">
                            <a class="card__link" href="{{ route('exhibition.ttn.labels') }}">
                                Explore the labels
                            </a>
                        </h3>
                    </div>
                    <div class="l-frame l-frame--3-2 card__image">
                        <img src="https://content.fitz.ms/fitz-website/assets/large_pd_132_1985_1_201808_adn21_dc2.jpg?key=directus-medium-crop"
                             alt=""
                             loading="lazy" />
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card" data-component="card">
                    <div class="l-box l-box--no-border card__text">
                        <h3 class="card__heading">
                            <a class="card__link" href="{{ route('exhibition.ttn.mapped') }}">
                                Explore a map of locations featured
                            </a>
                        </h3>
                    </div>
                    <div class="l-frame l-frame--3-2 card__image">
                        <img src="https://content.fitz.ms/fitz-website/assets/maptile.jpg?key=directus-medium-crop"
                             alt=""
                             loading="lazy" />
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card" data-component="card">
                    <div class="l-box l-box--no-border card__text">
                        <h3 class="card__heading">
                            <a class="card__link" href="{{ route('exhibition.ttn.artists') }}">
                                Learn about the artists
                            </a>
                        </h3>
                    </div>
                    <div class="l-frame l-frame--3-2 card__image">
                        <img src="https://content.fitz.ms/fitz-website/assets/arton1565-032ab.jpeg?key=directus-medium-crop"
                             alt=""
                             loading="lazy" />
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card" data-component="card">
                    <div class="l-box l-box--no-border card__text">
                        <h3 class="card__heading">
                            <a class="card__link" href="{{ route('exhibition.ttn.viewpoints') }}">
                                Exhibition viewpoints
                            </a>
                        </h3>
                    </div>
                    <div class="l-frame l-frame--3-2 card__image">
                        <img src="https://content.fitz.ms/fitz-website/assets/large_pd_219_1994_1_201808_mfj22_dc2.jpeg?key=directus-medium-crop"
                             alt=""
                             loading="lazy" />
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
