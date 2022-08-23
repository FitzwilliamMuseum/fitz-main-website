@if(!empty($exhibition['exhibition_partners'] ))
    @section('research-funders')
        <div class="container-fluid py-3">
            <div class="container">
                <h3>Funders and partners</h3>
                <div class="row">
                    @foreach($exhibition['exhibition_partners'] as $partner)
                        <x-partner-card
                            :altTag="$partner['partner']['partner_full_name']"
                            :title="$partner['partner']['partner_full_name']"
                            :image="$partner['partner']['partner_logo']"
                            :url="$partner['partner']['partner_url']"></x-partner-card>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
@endif
