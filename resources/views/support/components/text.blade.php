    {{-- text-component --}}
    @php
        $centered_heading = $page['centered_heading'];
        $centered_body = $page['centered_body'];
    @endphp
    @if(isset($centered_heading))
        <div class="container col-max-800 mx-auto support-text-component">
            <h2 class="text-component-title">{{ $centered_heading }}</h2>
            @if(isset($centered_body))
                <p>{{ isset($centered_body) ? $centered_body : '' }}</p>
            @endif
        </div>
    @endif
