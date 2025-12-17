<div class="position-relative">
  {{ html()->form('get', url('events/search'))->class('ml-auto')->open() }}
    @if($errors->any())
        <div class="form-group">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <h2>Location</h2>
    <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
        {{ html()->label('Museum')->class('btn btn-sm btn-outline-secondary active')->for('option1') }}
        {{ html()->radio('location', true, 'physical')->id('option1')->attributes(['autocomplete' => 'off']) }}
        
        {{ html()->label('Virtual')->class('btn btn-sm btn-outline-secondary')->for('option2') }}
        {{ html()->radio('location', false, 'virtual')->id('option2')->attributes(['autocomplete' => 'off']) }}
    </div>
    <hr />

    <h2>Choose your dates</h2>
    <div class="form-group">
        {{ html()->label('Date from:')->for('datefrom') }}
        {{ html()->date('datefrom')->id('datefrom')->class('date col-md-12 form-control mr-sm-2 mr-2')->placeholder('Start date')->value(old('datefrom'))->attributes(['aria-label' => 'Your query']) }}
    </div>
    <div class="form-group">
        {{ html()->label('Date to:')->for('dateto') }}
        {{ html()->date('dateto')->id('dateto')->class('date col-md-12 form-control mr-sm-2 mr-2')->placeholder('End date')->value(old('dateto'))->attributes(['aria-label' => 'Your query']) }}
    </div>
    <hr />

    {{-- <h2>Event type</h2> --}}
    {{-- @foreach ($events['data'] as $type) --}}
    {{-- <div class="form-check form-check__event-types"> --}}
    {{-- {{ html()->checkbox('types', null, Str::slug($type['title']))->id(Str::slug($type['title'])) }} --}}
    {{-- {{ html()->label($type['title'])->class('form-check-label')->for(Str::slug($type['title'])) }} --}}
    {{-- </div> --}}
    {{-- @endforeach --}}
    {{-- <hr class="mb-3" /> --}}

    {{ html()->submit('Search')->class('btn d-block btn-dark')->id('searchButton')->attributes(['aria-label' => 'Submit your search']) }}

{{ html()->form()->close() }}
</div>
