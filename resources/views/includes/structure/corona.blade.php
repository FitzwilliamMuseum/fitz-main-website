<div class="container-fluid py-3 bg-pastel">
    <div class="container">
        <div class="col-12 shadow-sm p-3 mx-auto">
            <div class="row">
                @foreach ($corona['data'] as $cor)
                    <div class="col-md-6 mt-3">
                        <img src="{{ $cor['icon']['data']['thumbnails'][5]['url']}}" height="80" width="80"
                             class="p-1 float-left" alt="{{ $cor['icon_alt_text'] }}"/>
                        {!! $cor['text']!!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
