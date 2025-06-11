<div class="row">
  @foreach($records as $result)
    <div class="col-md-4 mb-3">
      <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
          <h3 class="card__heading">
            @php
              $title = strip_tags(@markdown($result['title'][0]));
            @endphp
            <a class="card__link" href="{{ $result['url'][0] }}">{{ $title }}</a>
          </h3>
          @if(isset($result['pubDate']))
            <p class="text-info">
              Published: {{ Carbon\Carbon::parse($result['pubDate'][0])->format('j F Y') }}
            </p>
          @endif

          @if(isset($result['mimetype']))
            @if(!is_null($result['mimetype'] && $result['mimetype'] == 'application\pdf'))
              <p>
                <a href="{{$result['url'][0]}}">{{$result['url'][0]}}</a>
              </p>
            @else
              <p>
                <a href="{{URL::to('/')}}/{{$result['url'][0]}}">{{URL::to('/')}}/{{$result['url'][0]}}</a>
              </p>
            @endif
          @endif

          <p>
            <x-friendly-search :name="$result['contentType'][0]" :title="$result['contentType'][0]"></x-friendly-search>
            @if(isset($result['mimetype']))
              @if(!is_null($result['mimetype'] && $result['mimetype'] == 'application\pdf'))
                <span class="badge bg-dark p-2">
                  <i class="fas fa-file-pdf mr-2"></i>
                  <i class="fa fa-download mr-2" aria-hidden="true"></i> @humansize($result['filesize'][0],2)
                </span>
              @endif
            @endif

            @if($result['contentType'][0] == 'learning_files')
              <span class="badge bg-dark p-2">{{ $result['learningfiletype'][0]}}</span>
              @if(isset($result['keystages']))
                <span class="badge bg-dark p-2">Key Stages this is for: {{ implode(', ', $result['keystages']) }}</span>
              @endif
              @if(isset($result['curriculum_area']))
                <span class="badge bg-dark p-2">{{ $result['curriculum_area'][0]}}</span>
              @endif
            @endif
          </p>
        </div>

        <div class="l-frame l-frame--3-2 card__image">
          @if(isset($result['searchImage']))
            <img src="{{$result['searchImage'][0]}}"
                 alt=""
                 loading="lazy"/>
          @else
            <img src="https://content.fitz.ms/fitz-website/assets/portico.jpg"
                 alt=""
                 loading="lazy"/>
          @endif
        </div>
      </div>
    </div>
  @endforeach
</div>
