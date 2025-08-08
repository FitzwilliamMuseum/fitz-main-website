@if(!empty($gallery['audio_guide']))
@section('audio-guide')
<div class="container">
    <h2>
        Audio description
    </h2>
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
        <div class="shadow-sm p-3 mx-auto mb-3">
            <div class="plyr">
                <div class="audio-player">
                    <audio id="player" controls>
                        <source src="{{ $gallery['audio_guide']['data']['full_url'] }}" type="audio/aac">
                    </audio>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endif
