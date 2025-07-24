@php
    $component = $component['accordion_section'][0];

    $heading = !empty($component['heading']) ? $component['heading'] : '';
    $tagline = !empty($component['tagline']) ? $component['tagline'] : '';
    $accordion = !empty($component['accordion']) ? $component['accordion'] : '';
    $isAnchor = !empty($component['include_in_anchor_links']) ? $component['include_in_anchor_links'] : '';
    $slug = Str::slug($heading, '-');
@endphp
<div class="accordion-section">
    <div class="wrapper" @if($isAnchor) data-is-anchor id="{{ $slug }}" @endif>
        <div class="accordion-section__image">
            <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" class="card-img-top" width="416" height="416" load="lazy">
        </div>
        <div class="accordion-section__text">
            @if(!empty($heading))
                <h2>
                    {{ $heading }}
                </h2>
            @endif
            @if(!empty($tagline))
                <p>{{ $tagline }}</p>
            @endif
            @if(!empty($accordion))
                <div class="accordion-section__accordion" id="accordion-{{ $slug }}">
                    @foreach($accordion as $item)
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
                                @if(!empty($item['body']))
                                    @markdown($item['body'])
                                @endif
                                <div class="accordion-item__links">
                                    @if(!empty($item['links']))
                                        @foreach($item['links'] as $link)
                                            <a href="{{ $link['link_url'] }}"
                                            @if(!empty($link['link_style']) && $link['link_style'] == 'button') class="button button--block button--black" @endif>
                                                {{ $link['link_text'] }}
                                                @if(!empty($link['link_style']) && $link['link_style'] == 'button')
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
                @if(!empty($component['addendum']))
                    @markdown($component['addendum'])
                @endif
                @if(!empty($component['link']))
                    @php
                        $footer_link = $component['link'] ? $component['link'] : '';
                    @endphp
                    {{-- <p>{{ count($footer_link) }}</p> --}}
                    {{-- @if(!empty($footer_link))
                        <a href="{{ $footer_link['link_url'] }}"
                        @if($footer_link['link_style'] == 'button') class="button--block button--black" @endif>
                            {{ $footer_link['link_text'] }}
                            @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                        </a>
                    @endif --}}
                @endif
            </div>
        </div>
    </div>
</div>
