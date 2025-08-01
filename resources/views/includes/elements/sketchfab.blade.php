@foreach($record['_source']['identifier'] as $id)
@if($id['type'] == 'Online 3D model')
@section('sketchfab')
<div class="container">
    <h2>3D scan</h2>
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
        <div class="ratio ratio-4x3">
            <iframe title="A 3D model of {{ $record['_source']['summary_title'] }}"
                src="https://sketchfab.com/models/{{ $id['value']}}/embed?" allow="autoplay; fullscreen; vr"
                mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
        </div>
    </div>
</div>
@endsection
@endif
@endforeach
