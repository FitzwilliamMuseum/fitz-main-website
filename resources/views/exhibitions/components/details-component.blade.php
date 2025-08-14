<div class="component exhibition-details">
    <div class="container mx-auto col-max-800">
        <div class="exhibition-details__card">
            @php
                $details_heading = 'Exhibition Details';
                if($exhibition['type'] == 'display') {
                    $details_heading = 'Display Details';
                }
            @endphp
            <h2>{{ $details_heading }}</h2>
            <div class="exhibition-details__card__details">
                <p class="details__date">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="32" fill="none"><g clip-path="url(#a)"><g clip-path="url(#b)"><path fill="#000" d="M10.5 16.834H8.167v2.333H10.5v-2.334Zm4.667 0h-2.334v2.333h2.334v-2.334Zm4.666 0H17.5v2.333h2.333v-2.334Zm2.334-8.167H21V6.334h-2.333v2.333H9.333V6.334H7v2.333H5.833A2.323 2.323 0 0 0 3.512 11L3.5 27.334a2.333 2.333 0 0 0 2.333 2.333h16.334a2.34 2.34 0 0 0 2.333-2.334V11a2.34 2.34 0 0 0-2.333-2.333Zm0 18.667H5.833V14.5h16.334v12.834Z"/></g></g><defs><clipPath id="a"><path fill="#fff" d="M0 4h28v28H0z"/></clipPath><clipPath id="b"><path fill="#fff" d="M0 4h28v28H0z"/></clipPath></defs></svg>
                    {{ Carbon\Carbon::parse($exhibition['exhibition_start_date'])->format('j F Y') }} – {{ Carbon\Carbon::parse($exhibition['exhibition_end_date'])->format('j F Y') }}
                </p>
                <p class="details__time">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3997_4179)"><path d="M13.988 2.3335C7.54801 2.3335 2.33301 7.56016 2.33301 14.0002C2.33301 20.4402 7.54801 25.6668 13.988 25.6668C20.4397 25.6668 25.6663 20.4402 25.6663 14.0002C25.6663 7.56016 20.4397 2.3335 13.988 2.3335ZM13.9997 23.3335C8.84301 23.3335 4.66634 19.1568 4.66634 14.0002C4.66634 8.8435 8.84301 4.66683 13.9997 4.66683C19.1563 4.66683 23.333 8.8435 23.333 14.0002C23.333 19.1568 19.1563 23.3335 13.9997 23.3335Z" fill="black"/><path d="M14.583 8.1665H12.833V15.1665L18.958 18.8415L19.833 17.4065L14.583 14.2915V8.1665Z" fill="black"/></g><defs><clipPath id="clip0_3997_4179"><rect width="28" height="28" fill="white"/></clipPath></defs></svg>
                    {{ $exhibition['exhibition_time_information'] }}
                </p>
                <p class="details__ticket">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none"><path fill="#000" d="m2.334 17.181 2.652 2.652.353-.354a2.242 2.242 0 0 1 3.182 0 2.242 2.242 0 0 1 0 3.182l-.354.354 2.652 2.651 14.848-14.848-2.651-2.652-.354.354a2.242 2.242 0 0 1-3.182 0 2.242 2.242 0 0 1 0-3.182l.354-.353-2.652-2.652L2.334 17.181Zm1.414 0 9.015-9.015 7.071 7.071-9.015 9.015-1.276-1.276c.926-1.27.83-3.06-.315-4.204a3.252 3.252 0 0 0-4.21-.32l-1.27-1.27ZM13.47 7.46l3.712-3.712 1.27 1.27a3.252 3.252 0 0 0 .321 4.21c1.145 1.144 2.935 1.24 4.204.315l1.276 1.276-3.712 3.712-7.07-7.071Z"/><path fill="#000" d="m20.659 4.984-.413.413-.353.354a1.658 1.658 0 0 0 0 2.356 1.658 1.658 0 0 0 2.356 0l.354-.353.413-.412 3.476 3.476L10.818 26.49l-3.476-3.476.413-.412.353-.355.115-.126c.537-.657.499-1.615-.115-2.23a1.658 1.658 0 0 0-2.23-.115l-.126.115-.355.354-.412.412-3.476-3.476 10.43-10.43-.241-.24.4.079 5.085-5.083 3.476 3.476ZM4.572 17.182l.531.53a3.831 3.831 0 0 1 4.537.648c1.23 1.23 1.429 3.08.64 4.53l.538.538 8.19-8.19-6.245-6.247-8.19 8.191Zm9.722-9.723 6.246 6.245 2.887-2.887-.537-.537c-1.349.734-3.047.612-4.267-.401l-.263-.24a3.831 3.831 0 0 1-.647-4.536l-.532-.532-2.887 2.888Z"/></svg>
                    {{ $exhibition['exhibition_ticket_information'] }}
                </p>
                <p class="details__a11y">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none"><g fill="#000" clip-path="url(#a)"><path d="M19.833 7.63a2.333 2.333 0 1 0 0-4.667 2.333 2.333 0 0 0 0 4.667ZM16.334 19.833H14a3.51 3.51 0 0 1-3.5 3.5 3.51 3.51 0 0 1-3.5-3.5 3.51 3.51 0 0 1 3.5-3.5V14a5.836 5.836 0 0 0-5.833 5.833 5.835 5.835 0 0 0 5.833 5.834 5.835 5.835 0 0 0 5.834-5.834Zm3.5-4.083h-2.17l1.948-4.282c.712-1.552-.432-3.302-2.158-3.302h-6.067c-.945 0-1.797.549-2.182 1.4l-.781 2.1 2.24.619.758-1.785H14l-2.135 4.783c-.7 1.552.455 3.383 2.159 3.383h5.81V24.5h2.333v-6.417a2.34 2.34 0 0 0-2.333-2.333Z"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h28v28H0z"/></clipPath></defs></svg>
                    {{ $exhibition['exhbition_accessibility_information'] }}
                </p>
                <p class="details__location">
                    <svg width="28" height="28" color="#000" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"></path></svg>
                    {{ $exhibition['exhibition_location_information'] }}
                </p>
            </div>
            @if(!empty($exhibition['exhibition_details_accordion']))
                <div class="exhibition-accordion" id="accordionDetails">
                    @foreach($exhibition['exhibition_details_accordion'] as $item)
                        <div class="accordion-item">
                            <button type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#details-content-{{ $loop->index }}"
                            aria-expanded="false"
                            aria-controls="details-content-{{ $loop->index }}"
                            id="details-heading-{{ $loop->index }}">
                                @if(!empty($item['heading']))
                                    {{ $item['heading'] }}
                                @endif
                                @svg('fas-chevron-down', ['width' => '16px', 'height' => '16px', 'color' => '#000'])
                            </button>
                            @if(!empty($item['body']))
                                <div class="collapse" id="details-content-{{ $loop->index }}" aria-labelledby="details-heading-{{ $loop->index }}"
                                data-parent="#accordionDetails">
                                    @markdown($item['body'])
                                    @if (!empty($item['link']) && is_array($item['link']))
                                        @foreach($item['link'] as $link)
                                            @if(!empty($link['link_text']) && !empty($link['link_url']))
                                                <a class="collapse-item-link" href="{{ $link['link_url'] }}">{{ $link['link_text'] }}</a>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
