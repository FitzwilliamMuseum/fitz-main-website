    {{-- FAQ --}}
    @php
        $faq_heading = $page['faq_section_heading'];
        $faq_accordion = $page['accordion'];
    @endphp
    <div class="container-fluid col-max-800 faq">
        <div class="container faq-container">
            <h3 class="faq-title">{{ $faq_heading }}</h3>
            <div class="accordion mt-2" id="accordionDirections">
                @php
                    $iteration = 1;
                    $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                @endphp
                @foreach($faq_accordion as $faq)
                @php
                    $iterationNumber = $f->format($iteration);
                @endphp
                <div class="card faq-card">
                    <div class="card-header faq-card-header" id="heading{{ ucfirst(trans($iterationNumber)) }}">
                        <button class="faq-card-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ ucfirst(trans($iterationNumber)) }}" aria-expanded="false" aria-controls="collapse">
                            {{ $faq['Heading'] }}
                            @svg('fas-chevron-down', ['width' => '25px', 'height' => '25px'])
                        </button>
                    </div>
                    <div id="collapse{{ ucfirst(trans($iterationNumber)) }}" class="collapse" aria-labelledby="heading{{ ucfirst(trans($iterationNumber)) }}"
                        data-parent="#accordionDirections">
                        <div class="card-body">
                            {{ $faq['Body'] }}
                        </div>
                    </div>
                </div>
                @php
                    $iteration = $iteration += 1;
                @endphp
                @endforeach
                {{-- <div class="card faq-card">
                    <div class="card-header faq-card-header" id="headingTwo">
                        <button class="faq-card-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Can my money go to a specific collection?
                            @svg('fas-chevron-down', ['width' => '25px', 'height' => '25px'])
                        </button>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionDirections">
                        <div class="card-body">
                            Yes, you can specify where your money goes.
                        </div>
                    </div>
                </div>
                <div class="card faq-card">
                    <div class="card-header faq-card-header" id="headingThree">
                        <button class="faq-card-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Gift aid?
                            @svg('fas-chevron-down', ['width' => '25px', 'height' => '25px'])
                        </button>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionDirections">
                        <div class="card-body">
                            Yes, you can specify where your money goes.
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
