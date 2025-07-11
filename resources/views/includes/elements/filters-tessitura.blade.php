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

  <h2>Location</h2>
  <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
    <label class="btn btn-sm btn-outline-secondary active">
      <input type="radio" name="location" id="option1" autocomplete="off" value="physical" checked> Museum
    </label>
    <label class="btn btn-sm btn-outline-secondary">
      <input type="radio" name="location" id="option2" autocomplete="off" value="virtual"> Virtual
    </label>

  </div>
  <hr />

  <h2>Choose your dates</h2>
  <div class="form-group">
    <label for="datefrom" >Date from: </label>
    <input id="datefrom" type="date" class="date col-md-12" name="datefrom" type="text" class="form-control mr-sm-2 mr-2"
    placeholder="Start date" value="{{ old('datefrom') }}" aria-label="Your query">
  </div>
  <div class="form-group">
    <label for="dateto" >Date to: </label>
    <input id="dateto" type="date" class="date col-md-12" name="dateto" type="text" class="form-control mr-sm-2 mr-2"
    placeholder="End date" value="{{ old('dateto') }}" aria-label="Your query">
  </div>
  <hr />

  {{-- <h2>Event type</h2>
  @foreach ($events['data'] as $type)
    <div class="form-check form-check__event-types">
      <input type="checkbox" id="{{Str::slug($type['title'])}}" name="types" value="{{Str::slug($type['title'])}}">
      <label for="paid" class="form-check-label">{{$type['title']}}</label>
    </div>
  @endforeach

  <hr class="mb-3"/> --}}

  <button type="submit" class="btn d-block btn-dark" id="searchButton" aria-label="Submit your search">Search</button>


  {!! Form::close() !!}
</div>
