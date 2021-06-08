<div class="position-relative">
  {{ \Form::open(['url' => url('events/search'),'method' => 'GET', 'class' => ' ml-auto']) }}
  {{ csrf_field() }}
  @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
  {{-- <h2 class="lead">When?</h2>

  <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
    <label class="btn btn-sm btn-outline-secondary active">
      <input type="radio" name="when" id="today" autocomplete="off" value="today" > Today
    </label>
    <label class="btn btn-sm btn-outline-secondary">
      <input type="radio" name="when" id="tomorrow" autocomplete="off" value="tomorrow"> Tomorrow
    </label>
    <label class="btn btn-sm btn-outline-secondary">
      <input type="radio" name="when" id="7days" autocomplete="off" value="7_days"> 7 days
    </label>
  </div>
  <hr /> --}}


  <h2 class="lead">Location</h2>
  <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
    <label class="btn btn-sm btn-outline-secondary active">
      <input type="radio" name="location" id="option1" autocomplete="off" value="physical" checked> Museum
    </label>
    <label class="btn btn-sm btn-outline-secondary">
      <input type="radio" name="location" id="option2" autocomplete="off" value="virtual"> Virtual
    </label>

  </div>
  <hr />

  <h2 class="lead">Choose your dates</h2>
  <div class="form-group">
    <label for="datefrom" >Date from: </label>
    <input id="datefrom" type="date" class="date col-md-12" name="datefrom" type="text" class="form-control mr-sm-2 mr-2"
    placeholder="Start date"  value="{{ old('datefrom') }}" aria-label="Your query">
  </div>
  <div class="form-group">
    <label for="dateto" >Date to: </label>
    <input id="dateto" type="date" class="date col-md-12" name="dateto" type="text" class="form-control mr-sm-2 mr-2"
    placeholder="End date"  value="{{ old('dateto') }}" aria-label="Your query">
  </div>
  <hr />

  {{-- <h2 class="lead">Event type</h2>
  <div class="form-check">
    <input type="checkbox" id="ga" name="types" value="ga">
    <label for="paid" class="form-check-label" > General admission</label>
  </div>
  <div class="form-check">
    <input type="checkbox" id="linked" name="types" value="linked">
    <label for="free" class="form-check-label" >Admission + exhibition</label>
  </div>
  <div class="form-check">
    <input type="checkbox" id="families" name="types" value="families">
    <label for="free" class="form-check-label" >Families</label>
  </div>
  <div class="form-check">
    <input type="checkbox" id="lectures" name="types" value="lectures">
    <label for="free" class="form-check-label" >Lectures and talks</label>
  </div>

  <hr class="mb-3"/> --}}

  <button type="submit" class="btn d-block btn-dark" id="searchButton" aria-label="Submit your search">Search</button>


  {!! Form::close() !!}
</div>
