@php
    $getting_here = array(
        'heading' => 'Getting here',
        'is_anchor' => true,
        'subheading' => 'The Fitzwilliam Museum is located in the heart of Cambridge City',
        'location' => 'Trumpington Street, Cambridge, CB2 1RB',
        'accordion' => array(
            '1' => array(
                'heading' => 'By Car',
                'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur enim earum perspiciatis, doloribus placeat, deserunt ex quisquam dolores, asperiores illum optio. Officiis, sapiente error. Obcaecati deserunt omnis vero accusamus ullam.',
                'links' => array(
                    '1' => array(
                        'link_text' => 'Example',
                        'link_url' => '/',
                        'link_style' => 'button'
                    ),
                    '2' => array(
                        'link_text' => 'Example link styling',
                        'link_url' => '/',
                        'link_style' => 'default'
                    )
                )
            ),
            '2' => array(
                'heading' => 'By Train',
                'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur enim earum perspiciatis, doloribus placeat, deserunt ex quisquam dolores, asperiores illum optio. Officiis, sapiente error. Obcaecati deserunt omnis vero accusamus ullam.',
                'links' => array(
                    '1' => array(
                        'link_text' => 'Example',
                        'link_url' => '/',
                        'link_style' => 'button'
                    ),
                    '2' => array(
                        'link_text' => 'Example link styling',
                        'link_url' => '/',
                        'link_style' => 'default'
                    )
                )
            ),
            '3' => array(
                'heading' => 'By Bicycle',
                'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur enim earum perspiciatis, doloribus placeat, deserunt ex quisquam dolores, asperiores illum optio. Officiis, sapiente error. Obcaecati deserunt omnis vero accusamus ullam.',
                'links' => array(
                    '1' => array(
                        'link_text' => 'Example',
                        'link_url' => '/',
                        'link_style' => 'button'
                    ),
                    '2' => array(
                        'link_text' => 'Example link styling',
                        'link_url' => '/',
                        'link_style' => 'default'
                    )
                )
            ),
            '4' => array(
                'heading' => 'By Bus',
                'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur enim earum perspiciatis, doloribus placeat, deserunt ex quisquam dolores, asperiores illum optio. Officiis, sapiente error. Obcaecati deserunt omnis vero accusamus ullam.',
                'links' => array(
                    '1' => array(
                        'link_text' => 'Example',
                        'link_url' => '/',
                        'link_style' => 'button'
                    ),
                    '2' => array(
                        'link_text' => 'Example link styling',
                        'link_url' => '/',
                        'link_style' => 'default'
                    )
                )
            ),
        )
    )
@endphp
<div class="getting-here">
    <div class="container">
        <div class="getting-here__wrap"@if($getting_here['is_anchor']) data-is-anchor @endif>
            <div class="getting-here__map">
                @yield('map')
            </div>
            <div class="getting-here__details" id="accordionDirections">
                <h2>{{ $getting_here['heading'] }}</h2>
                <p>{{ $getting_here['subheading'] }}</p>
                <p class="location">
                    @svg('fas-location-dot', ['width' => '14px', 'height' => '20px', 'color' => '#000'])
                    {{ $getting_here['location'] }}
                </p>
                <div class="getting-here__accordion">
                    @foreach($getting_here['accordion'] as $item)
                        <div class="accordion-item">
                            <button type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#directions-content-{{ $loop->index }}"
                            aria-expanded="false"
                            aria-controls="directions-content-{{ $loop->index }}"
                            id="directions-heading-{{ $loop->index }}">
                                {{ $item['heading'] }}
                                @svg('fas-chevron-down', ['width' => '16px', 'height' => '16px', 'color' => '#000'])
                            </button>
                            <div class="collapse" id="directions-content-{{ $loop->index }}" aria-labelledby="directions-heading-{{ $loop->index }}" data-parent="#accordionDirections">
                                <p>{{ $item['body'] }}</p>
                                @if(!empty($item['links']))
                                    <div class="getting-here__accordion-links">
                                        @foreach($item['links'] as $link)
                                            <a href="{{ $link['link_url'] }}"
                                            @if($link['link_style'] == 'button') class="button button--block button--black" @endif>
                                                {{ $link['link_text'] }}
                                                @if($link['link_style'] == 'button')
                                                    @svg('fas-chevron-left', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                                                @endif
                                                
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>