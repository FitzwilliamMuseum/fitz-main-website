@section('developer')
    <section>
        <div class="container-fluid bg-gdbo">
            <div class="row">
                <div class="col-6">
                    <h3 class="my-3">Explore things made with our data</h3>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card card-fitz h-100">
                        <a href="https://twitter.com/fitzArtBot">
                            <img class="card-img-top"
                                 src="https://content.fitz.ms/fitz-website/assets/M-P.3_A-1914_4_201702_amt49_mas.jpg?key=exhibition"
                                 alt="An image showing one of the objects in Shannon and Ricketts Collection"
                                 loading="lazy"
                            />
                        </a>
                        <div class="card-body h-100">
                            <div class="contents-label mb-3">
                                <h2>
                                    <a href="https://twitter.com/fitzArtBot" class="stretched-link">
                                        Our Twitter bot
                                    </a>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card card-fitz h-100">
                        <a href="{{ env('COLLECTION_URL') }}/api">
                            <img class="card-img-top"
                                 src="https://content.fitz.ms/fitz-website/assets/json-peep.png?key=exhibition"
                                 alt="An image showing a JSON response "
                                 loading="lazy"
                            />
                        </a>
                        <div class="card-body h-100">
                            <div class="contents-label mb-3">
                                <h2>
                                    <a href="{{ env('COLLECTION_URL') }}/api" class="stretched-link">
                                        Our Collections API
                                    </a>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card card-fitz h-100">
                        <a href="{{ route('research-projects') }}">
                            <img class="card-img-top"
                                 src="https://content.fitz.ms/fitz-website/assets/XRF analysis of an illuminated mss at the Fitz.jpg?key=exhibition"
                                 alt="An image showing one of the objects in Shannon and Ricketts Collection"
                                 loading="lazy"
                            />
                        </a>
                        <div class="card-body h-100">
                            <div class="contents-label mb-3">
                                <h2>
                                    <a href="{{ route('research-projects') }}" class="stretched-link">
                                        Research projects
                                    </a>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
