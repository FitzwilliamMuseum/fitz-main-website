@if(!empty($exhibition['events_url']))
@section('events-url')
<div class="container mt-3">
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
        <a href="{{ $exhibition['events_url'] }}" class="btn btn-info px-3">Click here to view events related to this
            exhibition</a>
    </div>
</div>
@endsection
@endif