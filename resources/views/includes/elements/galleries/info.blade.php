@if(isset($gallery['gallery_floor']))
<h3>
    Gallery data
</h3>
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
    <ul>
        <li>{{ $gallery['gallery_floor'] }}</li>
    </ul>
</div>
@endif