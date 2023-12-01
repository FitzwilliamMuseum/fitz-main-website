@if(isset($gallery['gallery_description']))
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
    @markdown($gallery['gallery_description'])
</div>
@endif