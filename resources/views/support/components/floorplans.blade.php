@if(!empty($component['floorplan_positioning']) && $component['floorplan_positioning'] == true)
    <div class="container col-max-800">
        <h3 class="mb-3">Floorplans and guides</h3>
        <div class="row">
            @foreach($floors as $floorplans)
                <div class="col-md-4">
                    <x-floor-plans :floorplans="$floorplans"></x-floor-plans>
                </div>
            @endforeach
        </div>
    </div>
@endif