<h2>Ideas for young people</h2>
<div class="row">
    @foreach($sessions['data'] as $session)
        <div class="col-md-4 mb-3">
            <div class="card" data-component="card">
                <div class="l-box l-box--no-border card__text">
                    <h3 class="card__heading">
                        <a class="card__link" href="{{ route('young-people', $session['slug']) }}">
                            {{ $session['title'] }}
                        </a>
                    </h3>
                    @if(isset($session['key_stages']))
                        <p class="text-info">
                            Key stages: {{ implode(', ', $session['key_stages']) }}
                        </p>
                    @endif
                </div>
                <div class="l-frame l-frame--3-2 card__image">
                    @if(!is_null($session['hero_image']))
                        <img src="{{ $session['hero_image']['data']['thumbnails'][13]['url'] }}"
                             alt=""
                             loading="lazy" />
                    @else
                        <img src="{{ env('MISSING_IMAGE_URL') }}"
                             alt=""
                             loading="lazy" />
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
