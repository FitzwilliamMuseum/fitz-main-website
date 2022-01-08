<div class="row">
  @foreach($records as $result)
    <div class="col-md-4 mb-3">
      <div class="card h-100">
        @if(isset($result['searchImage']))
            <a href="{{ $result['url'][0]}}"><img src="{{$result['searchImage'][0]}}" class="card-img-top"  alt="Fitzwilliam Museum logo"
              loading="lazy"/></a>
          @else
            <a href="{{ $result['url'][0]}}"><img src="https://content.fitz.ms/fitz-website/assets/portico.jpg"
              class="card-img-top"  alt="FitzVirtual Logo" loading="lazy"/></a>
            @endif
            <div class="card-body ">
              <h3>
                @php
                $title = strip_tags(@markdown($result['title'][0]));
                @endphp
                <a href="{{ $result['url'][0]}}">{{ $title }}</a>
              </h3>
              @if(isset($result['pubDate']))
                <h4 class="text-info lead">
                  Published: {{  Carbon\Carbon::parse($result['pubDate'][0])->format('l dS F Y') }}
                </h4>
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

                <span class="badge badge-wine p-2 shorten-words text-truncate">Content to expect: @contentType($result['contentType'][0])</span>
                @if(isset($result['mimetype']))
                  @if(!is_null($result['mimetype'] && $result['mimetype'] == 'application\pdf'))
                    <span class="badge badge-wine p-2">
                      <i class="fas fa-file-pdf mr-2"></i>
                      <i class="fa fa-download mr-2" aria-hidden="true"></i> @humansize($result['filesize'][0],2)
                    </span>
                  @endif
                @endif

                @if($result['contentType'][0] == 'learning_files')
                  <span class="badge badge-wine p-2">{{ $result['learningfiletype'][0]}}</span>
                  @if(isset($result['keystages']))
                    <span class="badge badge-wine p-2">Key Stages this is for: {{ implode(', ', $result['keystages']) }}</span>
                  @endif
                  @if(isset($result['curriculum_area']))
                    <span class="badge badge-wine p-2">{{ $result['curriculum_area'][0]}}</span>
                  @endif
                @endif

              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
