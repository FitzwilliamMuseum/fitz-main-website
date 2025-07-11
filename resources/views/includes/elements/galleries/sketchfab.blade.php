@section('sketchfab-collection')
@if(!empty($gallery['sketchfab_id_collection']))
<div class="container">
    <h2>
        3D scans of objects in gallery
    </h2>
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
        <div class="ratio ratio-4x3">
            <iframe title="A 3D model of {{ $gallery['gallery_name'] }}"
                src="https://sketchfab.com/playlists/embed?collection={{ $gallery['sketchfab_id_collection']}}"
                allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
        </div>
    </div>
</div>
@endif
@endsection
