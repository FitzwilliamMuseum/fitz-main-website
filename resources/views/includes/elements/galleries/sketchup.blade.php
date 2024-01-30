@section('sketchfab')
@if(!empty($gallery['sketchfab_sketchup_id']))
<div class="container">
    <h3>
        Sketchup model of this gallery
    </h3>
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
        <div class="ratio ratio-4x3">
            <iframe title="A 3D sketchup model related to {{ $gallery['gallery_name']  }}"
                src="https://sketchfab.com/models/{{ $gallery['sketchfab_sketchup_id']}}/embed?"
                allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
        </div>
    </div>
</div>
@endif
@endsection