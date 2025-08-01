@section('360')
@if(!empty($gallery['image_360_pano']))
<div class="container">
    <h2 id="panorama-title">
        {{ $gallery['360_pano_title'] }}: {{ Carbon\Carbon::parse($gallery['360_pano_date'])->format('F Y') }}</h2>
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
        <div role="group" aria-labelledby="panorama-title" id="panorama"></div>
    </div>
</div>
@endif
@endsection
@if(!empty($gallery['image_360_pano']))
@section('360_image_url', $gallery['image_360_pano']['data']['full_url'])
@endif
