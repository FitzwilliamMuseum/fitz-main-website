@section('360')
@if(!empty($exhibition['image_360_pano']))
<div class="container-fluid">
    <div class="container">
        <h2 id="panorama-title">
            360 gallery image
        </h2>
        <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
            <div role="group" aria-labelledby="panorama-title" id="panorama"></div>
        </div>
    </div>
</div>
@endif
@endsection
@if(!empty($exhibition['image_360_pano']))
@section('360_image_url', $exhibition['image_360_pano']['data']['full_url'])
@endif
