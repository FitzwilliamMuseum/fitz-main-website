@section('sketchfab')
@if(!empty($exhibition['sketchfab_id']))
<div class="container">
    <h4 class="lead">3d model of this display or exhibition</h4>
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
        <div class="ratio ratio-4x3">
            <span>Please note that this content is currently not keyboard accessible. We are working to get this resolved as soon as possible.</span>
            <iframe title="A 3D  model related to this exhibition"
                src="https://sketchfab.com/models/{{ $exhibition['sketchfab_id']}}/embed?"
                allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
        </div>
    </div>
</div>
@endif
@endsection