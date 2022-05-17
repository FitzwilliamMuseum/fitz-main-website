<h3>Ideas for young people</h3>
<div class="row">
    @foreach($sessions['data'] as $session)
        <div class="col-md-4 mb-3">
            <div class="card  h-100">
                @if(!is_null($session['hero_image']))
                    <a href="{{ route('young-people', $session['slug']) }}">
                        <img class="img-fluid" src="{{ $session['hero_image']['data']['thumbnails'][13]['url']}}"
                             alt="{{ $session['hero_image_alt_text'] }}"
                             width="{{ $session['hero_image']['data']['thumbnails'][13]['height'] }}"
                             loading="lazy"/>
                    </a>
                @else
                    <img class="img-fluid" src="{{ env('MISSING_IMAGE_URL') }}"
                         alt="No image was provided for {{ $session['title'] }}"/>
                @endif
                <div class="card-body h-100">
                    <div class="contents-label mb-3">
                        <h3>
                            <a href="{{ route('young-people', $session['slug']) }}">
                                {{ $session['title'] }}
                            </a>
                        </h3>
                        @if(isset($session['key_stages']))
                            <p>
                                Key stages: {{ implode(',',$session['key_stages'])}}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
