<div class="container-fluid bg-grey py-3">
    <div class="container mb-3">
        <h3 class="mt-3">Getting here</h3>
        <div class="accordion mt-2" id="accordionDirections">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <button
                        class="btn btn-dark d-block text-center"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseOne"
                        aria-expanded="true"
                        aria-controls="collapseOne">
                        {{ $directions['data']['0']['method']}}
                    </button>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                     data-parent="#accordionDirections">
                    <div class="card-body">
                        @markdown($directions['data']['0']['directions'])
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <button class="btn btn-dark collapsed d-block text-center" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        {{ $directions['data']['1']['method']}}
                    </button>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionDirections">
                    <div class="card-body">
                        @markdown($directions['data']['1']['directions'])
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <button class="btn btn-dark collapsed d-block text-center" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        {{ $directions['data']['2']['method']}}
                    </button>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                     data-parent="#accordionDirections">
                    <div class="card-body">
                        @markdown($directions['data']['2']['directions'])
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFour">
                    <button class="btn btn-dark collapsed d-block text-center" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        {{ $directions['data']['3']['method']}}
                    </button>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                     data-parent="#accordionDirections">
                    <div class="card-body">
                        @markdown($directions['data']['3']['directions'])
                    </div>
                </div>
            </div>
        </div>


        {{--<h3 class="mt-3">Directions via Google Maps</h3>
        <div class="col-12 shadow-sm p-3 mx-auto mb-3">
            <div class="row text-center">
                @foreach ($transport['data'] as $transport)
                    <div class="col-md-3 mt-3 text-center">

                        <a href="{{ $transport['google_string']}}">
                            @svg($transport['fa_icon'], 'icon-lg my-3', ['height' => '50'])
                            <br/>
                            {{ $transport['title'] }}</a>
                    </div>
                @endforeach
            </div>
        </div>--}}
    </div>
</div>
