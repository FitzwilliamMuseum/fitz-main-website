<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
    {{ html()->form('get', route('search.results'))->class('your-form-class')->open() }}
    <div class="row center-block">
        <div class="col-lg-6 center-block">
            <div class="input-group">
                {{ html()->text('query', old('query'))
                    ->class('form-control me-2')
                    ->id('query')
                    ->placeholder('Search our site')
                    ->required() }}
                <span class="input-group-btn">
                    {{ html()->submit('Search...')->class('btn btn-dark') }}
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
    {{ html()->form()->close() }}
</div>