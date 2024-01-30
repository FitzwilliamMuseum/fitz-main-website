<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
    {{ Form::open(['url' => url('search/results'),'method' => 'GET']) }}
    <div class="row center-block">
        <div class="col-lg-6 center-block">
            <div class="input-group">
                <input type="text" id="query" name="query" class="form-control me-2" placeholder="Search our site"
                    required value="{{ old('query') }}">
                <span class="input-group-btn">
                    <button class="btn btn-dark" type="submit">Search...</button>
                </span>
            </div>
        </div>
    </div>
    @if(count($errors))
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
    {!! Form::close() !!}
</div>