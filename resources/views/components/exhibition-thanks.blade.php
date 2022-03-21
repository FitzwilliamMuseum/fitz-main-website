@if(!empty($exhibition['exhibition_thank_you']))
    <div class="container">
        <div class="col-12 shadow-sm p-3 mx-auto mb-3 mt-3">
            <h3>Acknowledgements</h3>
            @markdown($exhibition['exhibition_thank_you'])
        </div>
    </div>
@endif
