@foreach($data['data'] as $datum)
  <div class="col-md-4 mb-3">
    <div class="card  h-100">
      @if(!is_null($datum['hero_image']))
      <a href="{{ $datum['url']}}"><img class="img-fluid" src="{{ $datum['hero_image']['data']['thumbnails'][4]['url']}}"
          alt="{{ $datum['hero_image_alt_text'] }}" /></a>
      @endif
        <div class="card-body h-100">
          <div class="contents-label mb-3">
            <h3 class="lead">
              <a href="{{ $datum['url']}}">{{ $datum['title']}}</a>
            </h3>
            @isset($datum['sub_title'])
              <p class="text-info">{{ $datum['sub_title']}}</p>
            @endisset
          </div>
        </div>
      </div>
    </div>
@endforeach
