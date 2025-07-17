<div class="accordion-section">
    <div class="container" @if($section['is_anchor']) data-is-anchor @endif @if($section['is_anchor'])id="{{ $section['slug'] }}"@endif>
        <div class="accordion-section__image">
            <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" class="card-img-top" width="416" height="416" load="lazy">
        </div>
        <div class="accordion-section__text">
            @if(!empty($section['heading']))
                <h2>
                    {{ $section['heading'] }}
                </h2>
            @endif
            @if(!empty($section['subheading']))
                <p>{{ $section['subheading'] }}</p>
            @endif
            @if(!empty($section['accordion']))
                @php
                    $slug = $section['slug']
                @endphp
                <div class="accordion-section__accordion" id="accordion-{{ $slug }}">
                    @foreach($section['accordion'] as $item)
                        <div class="accordion-item">
                            <button type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#{{ $slug }}-content-{{ $loop->index }}"
                            aria-expanded="false"
                            aria-controls="{{ $slug }}-content-{{ $loop->index }}"
                            id="{{ $slug }}-heading-{{ $loop->index }}">
                                {{ $item['heading'] }}
                                @svg('fas-chevron-down', ['width' => '16px', 'height' => '16px', 'color' => '#000'])
                            </button>
                            <div class="collapse" 
                            id="{{ $slug }}-content-{{ $loop->index }}"
                            aria-labelledby="{{ $slug }}-heading-{{ $loop->index }}"
                            data-parent="accordion-{{ $slug }}">
                                <p>{{ $item['body'] }}</p>
                                <div class="accordion-item__links">
                                    @if(!empty($item['links']))
                                        @foreach($item['links'] as $link)
                                            <a href="{{ $link['link_url'] }}"
                                            @if($link['link_style'] == 'button') class="button button--block button--black" @endif>
                                                {{ $link['link_text'] }}
                                                @if($link['link_style'] == 'button')
                                                    @svg('fas-chevron-left', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                                                @endif
                                                
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="accordion-section__footer">
                @if(!empty($section['addendum']))
                    <p>{{ $section['addendum'] }}</p>
                @endif
                @if(!empty($section['footer_link']))
                    @php
                        $footer_link = $section['footer_link'];
                    @endphp
                    <a href="{{ $footer_link['link_url'] }}"
                    @if($footer_link['link_style'] == 'button') class="button--block button--black" @endif>
                        {{ $footer_link['link_text'] }}
                        @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>