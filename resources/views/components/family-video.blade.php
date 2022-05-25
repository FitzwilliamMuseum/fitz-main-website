<div class="col-md-4 mb-3">
    <div class="card  h-100">
        @if(isset($session['youtube_id']))
            <div class="ratio ratio-16x9">
                <iframe title="A YouTube video from the Fitzwilliam Museum"
                        src="https://www.youtube.com/embed/{{$session['youtube_id']}}"
                        allowfullscreen></iframe>
            </div>
        @elseif(isset($session['vimeo_id']))
            <div class="ratio ratio-16x9">
                <iframe title="A Vimeo video from the Fitzwilliam Museum"
                        src="https://player.vimeo.com/video/{{$session['vimeo_id']}}"
                        allowfullscreen></iframe>
            </div>
        @endif
        <div class="card-body ">
            <div class="contents-label mb-3">
                <h2>
                    {{ $session['title'] }}
                </h2>
            </div>
        </div>
    </div>
</div>
