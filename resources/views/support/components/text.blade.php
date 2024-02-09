    {{-- text-component --}}
    @php
        if(!empty($page['centered_heading'])) {
            $centered_heading = $page['centered_heading'];
        }
        if(!empty($page['centered_body'])) {
            $centered_body = $page['centered_body'];
        }
    @endphp
    @if(!empty($centered_heading))
        <div class="container col-max-800 mx-auto support-text-component">
            <h2 class="text-component-title">{{ $centered_heading }}</h2>
            @if(!empty($centered_body))
                <p>{{ !empty($centered_body) ? $centered_body : '' }}</p>
            @endif
        </div>
    @endif
