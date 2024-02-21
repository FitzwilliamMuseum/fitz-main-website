    {{-- FAQ --}}

    @php
        if(!empty($component['accordion_component'][0]['accordion_heading'])) {
            $accordion_heading = $component['accordion_component'][0]['accordion_heading'];
        }
    @endphp
    <div class="container-fluid  faq">
        <div class="container col-max-800 faq-container">
            @if(!empty($accordion_heading))
                <h3 class="faq-title">{{ $accordion_heading }}</h3>
            @endif
            <div class="accordion mt-2" id="accordionDirections">
                @php
                    $iteration = 1;
                    $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                @endphp
                @foreach($component['accordion_component'][0]['accordion'] as $accordion_item)
                    @php
                        $iterationNumber = $f->format($iteration);
                        if(!empty($accordion_item['heading'])) {
                            $heading = $accordion_item['heading'];
                        }
                        if(!empty($accordion_item['body'])) {
                            $body = $accordion_item['body'];
                        }
                    @endphp
                    <div class="card faq-card">
                        <div class="card-header faq-card-header" id="heading{{ ucfirst(trans($iterationNumber)) }}">
                            <button class="faq-card-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ ucfirst(trans($iterationNumber)) }}" aria-expanded="false" aria-controls="collapse">
                                {{ $heading }}
                                @svg('fas-chevron-down', ['width' => '25px', 'height' => '25px'])
                            </button>
                        </div>
                        <div id="collapse{{ ucfirst(trans($iterationNumber)) }}" class="collapse" aria-labelledby="heading{{ ucfirst(trans($iterationNumber)) }}"
                            data-parent="#accordionDirections">
                            <div class="card-body">
                                @markdown($body)
                            </div>
                        </div>
                    </div>
                    @php
                        $iteration = $iteration += 1;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>
