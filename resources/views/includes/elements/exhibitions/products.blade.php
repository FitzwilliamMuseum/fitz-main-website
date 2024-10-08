@if(!empty($products))
    @section('shopify')
        <div class="container py-3">
            <h2 class="mb-3">Suggested Curating Cambridge products</h2>
            <div class="row">
                @foreach($products as $record)
                    <x-shopify-live-card :result="$record"></x-shopify-live-card>
                @endforeach
            </div>
        </div>
    @endsection
@endif
