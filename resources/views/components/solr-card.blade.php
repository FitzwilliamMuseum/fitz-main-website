<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @if(!is_null($result['smallimage']))
            <a href="{{ $result['url'][0] }}" class="stretched-link">
                <img src="{{ $result['smallimage'][0]}}"
                     alt="Highlight image for {{ $result['title'][0] }}"
                     loading="lazy"
                     width="416"
                     height="416"
                     class="card-img-top"
                />
            </a>
        @else
            <img class="card-img-top"
                 src="{{ env('MISSING_IMAGE_URL') }}"
                 alt="A stand in image for {{ $result['title'][0] }}"
                 loading="lazy"
            />
        @endif
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h3><a href="{{ $result['url'][0] }}" class="stretched-link">{{ $result['title'][0] }}</a></h3>
                @isset($result['publication_date'][0])
                    <p class="text-info">{{ Carbon\Carbon::parse($result['publication_date'][0] )->format('l dS F Y')}}</p>
                    @if(Carbon\Carbon::parse($result['publication_date'][0])->diffInDays() > 120)
                        <div class="alert alert-danger" role="alert">
                            Article over 4 months old.
                        </div>
                    @endif

                @endisset
            </div>
        </div>
    </div>
</div>

