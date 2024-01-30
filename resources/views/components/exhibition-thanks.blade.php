@if(!empty($exhibition['exhibition_thank_you']))
<div class="container">
    <div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3 mt-3">
        <h2>
            Acknowledgements
        </h2>
        @markdown($exhibition['exhibition_thank_you'])
    </div>
</div>
@endif