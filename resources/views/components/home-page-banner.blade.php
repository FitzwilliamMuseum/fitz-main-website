@if(!empty($banners))
    <div class="container-fluid exhibitions_top_banner">
        <div class="container-fluid mt-5 exhibitions_header">
            <div class="row d-flex h-100 exhibitions_sub">
                <div class="col-md-6 px-0">
                    <a href="{{ route('exhibition', $banners['linked_exhibition'][0]['exhibitions_id']['slug'] ) }}"
                       title="Exhibition details for {{ $banners['linked_exhibition'][0]['exhibitions_id']['exhibition_title'] }}">
                        <img src="{{$banners['left_image']['data']['full_url']}}"
                             class="img-fluid"
                             alt="{{ $banners['left_image_alt_text'] }}"
                             height="1000"
                             width="1000"
                        />
                    </a>
                </div>

                <div class="col-md-6 px-0 exhibitions__link">
                    <a href="{{ route('exhibition', $banners['linked_exhibition'][0]['exhibitions_id']['slug']   ) }}"
                       title="Exhibition details for {{ $banners['linked_exhibition'][0]['exhibitions_id']['exhibition_title'] }}"
                       class="exhibitions__link__href">
                        <img src="{{ $banners['right_image']['data']['full_url'] }}" class="img-fluid" alt="" height="1000" width="1000" />
                    </a>
                    <p class="text-center visually-hidden text-white py-3 exhibitions-title">{{$banners['exhibition_title']}}</p>
                    @if(isset($data['exhibition_subtitle']))
                        <p class="visually-hidden text-center text-white exhibitions-subtitle">{{$banners['exhibition_subtitle']}}</p>
                    @endif
                    @if(isset($data['exhibition_dates']))
                        <p class="visually-hidden text-center text-white py-1 exhibitions-dates">{{$banners['exhibition_dates']}}</p>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <script>
        const exhibit = document.querySelector(".exhibitions__link");
        const exhibitLink = exhibit.querySelector(".exhibitions__link__href");
        const clickableElements = Array.from(exhibit.querySelectorAll("a"));
        clickableElements.forEach((ele) =>
            ele.addEventListener("click", (e) => e.stopPropagation())
        );

        function handleClick(event) {
            const noTextSelected = !window.getSelection().toString();

            if (noTextSelected) {
                mainLink.click();
            }
        }
    </script>
    <style>
        .exhibitions_top_banner {
            min-height: 40vh;
            margin-top: 60px;
            background-color: {{ $banners['button_colour']}};
        }
        .exhibitions-title {
            font-size: 3.3rem;
        }

        .exhibitions-subtitle {
            font-size: 1.4rem;
        }

        .exhibitions-dates {
            font-size: 1.2rem
        }

        .exhibitions_sub {
            margin-left: -30px;
            margin-right: -30px;
        }

        .exhibitions_header {
            min-height: 40vh;
            background-color: {{ $banners['button_colour']}};
        }

        .exhibitions__link a {
            text-decoration: none;
            color: white;
        }
        .exhibitions__link a:hover,.exhibitions__link__link a:visited,.exhibitions__link__link a:focus {
            text-decoration: none;
            color: white;
        }

        /*
        .exhibitions__link {
            min-height: 400px;
            background: url('{{ $banners['right_image']['data']['full_url'] }}') no-repeat center;
            background-size: contain;
        }
        */

        .exhibitions__link__href {
            display: block;
            height: 100%;
            width: 100%;
        }
        .btn-exhibitions{color:#fff;background-color:{{ $banners['button_colour'] }};border-color:{{ $banners['button_colour'] }}}
        .btn-exhibitions:hover{color:#fff;background-color:{{ $banners['button_colour'] }};border-color:{{ $banners['button_colour'] }}}
        .btn-exhibitions:focus,.btn-exhibitions.focus{box-shadow:0 0 0 .2rem rgba(0,90,90,0.5)}
        .btn-exhibitions.disabled,.btn-exhibitions:disabled{color:#fff;background-color:{{ $banners['button_colour'] }}border-color:{{ $banners['button_colour'] }}}
        .btn-exhibitions:not(:disabled):not(.disabled):active,.btn-exhibitions:not(:disabled):not(.disabled).active,.show>.btn-exhibitions.dropdown-toggle{color:#fff;background-color:{{ $banners['button_colour'] }}border-color:{{ $banners['button_colour'] }}}
        .btn-exhibitions:not(:disabled):not(.disabled):active:focus,.btn-exhibitions:not(:disabled):not(.disabled).active:focus,.show>.btn-exhibitions.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(0,90,90,0.5)}
    </style>
@endif
