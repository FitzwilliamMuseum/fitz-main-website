@foreach($record['_source']['identifier'] as $id)
  @if($id['type'] == 'Online 3D model')
    @section('sketchfab')
    <div class="container">
      <h3>3D scan</h3>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        <div class="embed-responsive embed-responsive-4by3">
          <iframe title="A 3D model of {{ $record['_source']['summary_title'] }}" class="embed-responsive-item"
          src="https://sketchfab.com/models/{{ $id['value']}}/embed?"
           allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
        </div>
      </div>
    </div>
    @endsection
  @endif
@endforeach
