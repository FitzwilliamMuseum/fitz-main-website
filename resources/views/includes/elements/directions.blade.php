<div class="container mb-3">
  <h2 class="mt-3">Getting here</h2>
  <div class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <a class="btn btn-dark d-block text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            {{ $directions['data']['0']['method']}}
          </a>
        </h5>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            @markdown($directions['data']['0']['directions'])
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <a class="btn btn-dark collapsed d-block text-center" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            {{ $directions['data']['1']['method']}}
          </a>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
            @markdown($directions['data']['1']['directions'])
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <a class="btn btn-dark collapsed d-block text-center" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            {{ $directions['data']['2']['method']}}
          </a>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
          @markdown($directions['data']['2']['directions'])
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <a class="btn btn-dark collapsed d-block text-center" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            {{ $directions['data']['3']['method']}}
          </a>
        </h5>
      </div>
      <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
        <div class="card-body">
          @markdown($directions['data']['3']['directions'])
        </div>
      </div>
    </div>
  </div>
  <h2 class="mt-3">Directions</h2>
  <div class="col-12 shadow-sm p-3 mx-auto mb-3">
    <div class="row text-center">
      @foreach ($transport['data'] as $transport)
        <div class="col-md-3 mt-3 text-center">
          <a href="{{ $transport['google_string']}}"><i class="fa fa-{{ $transport['fa_icon']}} fa-5x circle-icon"/></i>
          <br/>
          {{ $transport['title'] }}</a>
        </div>
      @endforeach
  </div>
  </div>
</div>
