@section('collection-search')
    <div class="container-fluid">
        <div class="container">
            <div class="mx-auto mb-3">
                <div class="acknowledgement-notice">
                    <div class="wrapper">
                        <h2>{{ $subtitle }}</h2>
                        <p>{{ $page }}</p>
                    </div>
                </div>
            </div>
            <div class="mx-auto mb-3 bg-white">
                {{ Form::open(['url' => url('https://data.fitzmuseum.cam.ac.uk/search/results'),'method' => 'GET', 'class' => 'bg-white acknowledgement-collection-form']) }}
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="collection-query">Search our objects and artworks</label>
                        <input type="text" id="collection-query" name="query" value="" class="form-control input-lg mr-4" placeholder="Search our collection" required value="{{ old('query') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3>Visual results</h3>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="images" name="images">
                            <label class="form-check-label" for="images">Only with images?</label>
                        </div>
                        <div class="form-check ">
                            <input type="checkbox" class="form-check-input" id="iiif" name="iiif">
                            <label class="form-check-label" for="iiif">Deep zoom enabled (IIIF)?</label>
                        </div>
                    </div>
                    <div class="col">
                        <h3>Operator</h3>
                        <div class="form-check form-check-inline mb-3">
                            <input class="form-check-input" type="radio" name="operator" id="operator" value="AND"
                                   checked>
                            <label class="form-check-label" for="operator">
                                AND
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="operator" id="operator" value="OR">
                            <label class="form-check-label" for="operator">
                                OR
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <h3>Sort by last update</h3>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sort" id="sort" value="desc" checked>
                            <label class="form-check-label" for="sort">
                                Descending
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sort" id="sort" value="asc">
                            <label class="form-check-label" for="sort">
                                Ascending
                            </label>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-dark">Submit</button>
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

                {{ Form::open(['url' => url('objects-and-artworks/highlights/search/results'),'method' => 'GET', 'class' => 'acknowledgement-highlights-form']) }}
                <div class="row">
                        <label for="highlights-query">Search our highlights</label>
                        <div class="col-lg-12 mb-3 form-field">
                            <input type="text" id="highlights-query" name="query" value="" class="form-control input-lg me-4" placeholder="Search our highlight objects" required value="{{ old('query') }}&contentType:pharos">
                            <button class="btn btn-dark" type="submit">Search...</button>
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
    </div>
@endsection
