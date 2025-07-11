@section('developer')
    <section class="container-fluid bg-gdbo p-2">
        <div class="container">
            <h3 class="my-3">Explore more...</h3>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card" data-component="card">
                        <div class="l-box l-box--no-border card__text">
                            <h3 class="card__heading"><a class="card__link" href="{{ env('COLLECTION_URL') }}/api">Our Collections API</a>
                            </h3>
                        </div>
                        <div class="l-frame l-frame--3-2 card__image">
                            <img src="https://content.fitz.ms/fitz-website/assets/json-peep.png?key=exhibition" alt="" loading="lazy" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card" data-component="card">
                        <div class="l-box l-box--no-border card__text">
                            <h3 class="card__heading"><a class="card__link" href="{{ route('research-projects') }}">Research projects</a>
                            </h3>
                        </div>
                        <div class="l-frame l-frame--3-2 card__image">
                            <img src="https://content.fitz.ms/fitz-website/assets/XRF analysis of an illuminated mss at the Fitz.jpg?key=exhibition" alt="" loading="lazy" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card" data-component="card">
                        <div class="l-box l-box--no-border card__text">
                            <h3 class="card__heading"><a class="card__link" href="{{ route('objects') }}/immunity-from-seizure">Immunity from seizure</a>
                            </h3>
                        </div>
                        <div class="l-frame l-frame--3-2 card__image">
                            <img src="https://content.fitz.ms/fitz-website/assets/gotgs-deer.jpg?key=exhibition" alt="" loading="lazy" />
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
