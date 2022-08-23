@if(!empty($gallery['gallery_status']))
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        @foreach($gallery['gallery_status'] as $status)
            <span class="badge bg-dark">{{ $status }}</span>
        @endforeach
    </div>
@endif
