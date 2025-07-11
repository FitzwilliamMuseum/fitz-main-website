@section('youtube')
<div class="container pt-3">
    @if(isset($exhibition['youtube_id']) && $exhibition['youtube_id']!= '' )
    <h2>
        Explore our films
    </h2>
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
        <div class="ratio ratio-16x9">
            <iframe title="A film related to {{ $exhibition['exhibition_title'] }}" loading="lazy"
                src="https://www.youtube.com/embed/{{$exhibition['youtube_id']}}" allowfullscreen></iframe>
        </div>
    </div>
    @endif

    @if(isset($exhibition['youtube_secondary_id']) && $exhibition['youtube_secondary_id']!= '' )
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
        <div class="ratio ratio-16x9">
            <iframe title="A film related to {{ $exhibition['exhibition_title'] }}" loading="lazy"
                src="https://www.youtube.com/embed/{{$exhibition['youtube_secondary_id']}}" allowfullscreen></iframe>
        </div>
    </div>
    @endif

    @if(isset($exhibition['youtube_playlist_id']))
    <h2>
        Explore our films - a playlist
    </h2>
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 ">
        <div class="ratio ratio-16x9">
            <iframe title="A YouTube video playlist from the Fitzwilliam Museum"
                src="https://www.youtube.com/embed/videoseries?list={{$exhibition['youtube_playlist_id']}}"
                allowfullscreen></iframe>
        </div>
    </div>
    @endif
</div>
@endsection
