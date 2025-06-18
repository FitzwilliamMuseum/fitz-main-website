@if(!empty($events))
    @section('tnew-data')
        <div class="container pt-3">
            <h2>Special events for this exhibition</h2>
            <div class="row">
                @foreach($events as $production)
                    <x-tessitura-production-details-card
                        :production="$production"></x-tessitura-production-details-card>
                @endforeach
            </div>
        </div>
    @endsection
@endif
