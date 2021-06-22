@if(!empty($records))
  <h3 class="lead">
    Related to this page
  </h3>

  <div class="row">
    @foreach($records as $record)
      <div class="col-md-4 mb-3">
        <div class="card  h-100">
          @if(!is_null($record['thumbnail']))
            <a href="{{ $record['url'][0]}}"><img class="img-fluid" src="{{ $record['thumbnail'][0]}}"
              alt="Highlight image for {{ $record['title'][0] }}" /></a>
            @else
              <a href="{{ $record['url'][0]}}"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                alt="No image was provided for {{ $record['title'][0] }}"/></a>
              @endif
              <div class="card-body h-100">
                <div class="contents-label mb-3">
                  <h3 class="lead">
                    <a href="{{ $record['url'][0]}}">{{ $record['title'][0] }}</a>
                  </h3>
                </div>
              </div>
            </div>

          </div>
        @endforeach
      </div>
    @endif
