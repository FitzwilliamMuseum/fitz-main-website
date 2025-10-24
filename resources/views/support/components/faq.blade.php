    {{-- FAQ --}}

    @php
        if(!empty($component['accordion_component'][0]['accordion_heading'])) {
            $accordion_heading = $component['accordion_component'][0]['accordion_heading'];

            $accordion_heading_encoded = preg_replace("/[^A-Za-z0-9 ]/", '', $accordion_heading);
            $accordion_heading_encoded = str_replace(' ', '-', $accordion_heading_encoded);
        }
    @endphp
    <div class="container-fluid faq">
        <div class="container col-max-800 faq-container">
            @if(!empty($accordion_heading))
                <h2 class="faq-title">{{ $accordion_heading }}</h2>
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

                            // define the heading and content classes for each individual accordion item
                            $headingID = 'heading-'  . $accordion_heading_encoded . '-' . ucfirst(trans($iterationNumber));
                            $contentID = 'collapse-' . $accordion_heading_encoded . '-' . ucfirst(trans($iterationNumber));
                        @endphp
                        <div class="card faq-card">
                            <div class="card-header faq-card-header" id="{{ $headingID }}">
                                <button class="faq-card-btn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#{{ $contentID }}" aria-expanded="false" aria-controls="{{ $contentID }}">
                                    {{ $heading }}
                                    @svg('fas-chevron-down', ['width' => '25px', 'height' => '25px'])
                                </button>
                            </div>
                            <div id="{{ $contentID }}" class="collapse" aria-labelledby="{{ $headingID }}"
                                data-parent="#accordionDirections">
                                <div class="card-body">
                                    @markdown($body)
                                    @if(isset($accordion_item['embed']) && !empty($accordion_item['embed']))
                                        <div class="soundcloud-embed-component">
                                            <div class="container">
                                                {!! $accordion_item['embed'] !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
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
