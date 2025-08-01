<!-- Footer logos -->
<!--suppress HtmlUnknownAnchorTarget -->

<footer class="bg-pastel main-footer">
        <div class="fitz-footer bg-white border-cambridge">
            <div class="footer-wrapper">
                <div class="text-center">
                    <a href="https://www.museums.cam.ac.uk">
                        <img class="mx-auto my-2" loading="lazy" width="200" height="62"
                            alt="University of Cambridge Museums" src="{{ asset('/images/logos/ucm_logo.svg') }}" />
                    </a>
                </div>
                <div class="text-center">
                    <a href="https://www.cambridge.gov.uk/">
                        <img class="mx-auto my-2" loading="lazy" width="60" height="73.85" alt="Cambridge City Council"
                            src="{{ asset('/images/logos/Cambridge_City.svg') }}" />
                    </a>
                </div>
                <div class="text-center">
                    <a href="https://www.artscouncil.org.uk/">
                        <img class="mx-auto my-2" alt="Arts Council England"
                            src="{{ asset('/images/logos/ace_grant_eps_black.svg')}}" loading="lazy" width="200"
                            height="63.3833" />
                    </a>
                </div>
                <div class="text-center">
                    <a href="https://re.ukri.org/">
                        <img class="mx-auto my-2" alt="Research England" loading="lazy" width="200" height="63.5"
                            src="{{ asset('images/logos/UKRI_RE-Logo_Horiz-RGB.svg')}}" />
                    </a>
                </div>
            </div>
        </div>
        <div class="fitz-footer-links">
            <div class="footer-wrapper">
                <div class="pt-2">
                    <h2 class="visually-hidden">Contact us</h2>
                    <p>
                        Fitzwilliam Museum<br />
                        Trumpington Street<br />
                        Cambridge<br />
                        CB2 1RB<br />
                        +44 (0)1223 332 900<br />
                        @svg('fas-at',['width'=> 20]) <a href="mailto:enquiries@fitzmuseum.cam.ac.uk">enquiries@fitzmuseum.cam.ac.uk</a><br />
                        @svg('fas-at',['width'=> 20]) <a href="mailto:tickets@museums.cam.ac.uk">tickets@museums.cam.ac.uk</a>
                    </p>
                </div>
                <div class="pt-2">
                    <h2 class="visually-hidden">Useful links</h2>
                    <ul class="share">
                        <li>
                            <a href="{{ route('visit') }}">
                                Plan your visit
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('objects') }}">
                                Explore our collection
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('landing', ['about-us']) }}">
                                About us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('landing-section', ['commercial-services', 'venue-hire']) }}">
                                Venue hire
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('landing-section', ['commercial-services', 'image-library']) }}">
                                Image library
                            </a>
                        </li>

                        <li>
                            <a aria-label="Work with us" href="{{ route('vacancies')}}">Work with us</a>
                        </li>
                        <li>
                            <a href="https://www.museums.cam.ac.uk/"
                                aria-label="The University of Cambridge museums site">University
                                of Cambridge Museums</a>
                        </li>
                        <li>
                            <a href="https://www.fitzmuseum.cam.ac.uk/about-us/equity-diversity-and-inclusion">Equity,
                                diversity and inclusion</a>
                        </li>
                        <li>
                            <a href="https://www.registrarysoffice.admin.cam.ac.uk/governance-and-strategy/anti-slavery-and-anti-trafficking"
                                aria-label="Modern Slavery Act statement of compliance">Modern Slavery Act
                                statement</a>
                        </li>

                    </ul>
                </div>
                <div class="pt-2">
                    <h2 class="visually-hidden">About the University and licenses</h2>
                    <ul class="share">
                        <li>
                            <a href="{{ route('landing-section', ['about-us', 'privacy-and-cookies'])}}">Cookies,
                                privacy and
                                accessibility</a>
                        </li>
                        <li>
                            <a href="#" data-cc="c-settings">Cookie preferences</a>
                        </li>
                        <li>
                            <a href="{{ route('landing-section', ['about-us', 'terms-of-use-of-our-website'])}}"
                                aria-label="Website terms and conditions">Website terms of use</a>
                        </li>
                        <li>
                            <a aria-label="Our Collections API" href="{{env('COLLECTION_URL')}}/api">Collections
                                API</a>
                        </li>
                        <li>
                            <a href="{{ route('landing-section', ['about-us', 'terms-of-sale'])}}"
                                aria-label="Terms of sale for tickets">Terms of sale</a>
                        </li>

                        <li>
                            <a href="https://creativecommons.org/licenses/by/4.0/" aria-label="CC-BY license terms">
                                Content: CC-BY
                            </a>
                        </li>
                        <li>
                            <a href="https://creativecommons.org/share-your-work/public-domain/cc0/"
                                aria-label="CC0 license terms">
                                Metadata: CC0
                            </a>
                        </li>
                        <li>
                            <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/" aria-label="CC-BY-NC-ND license terms">
                                Images: CC-BY-NC-ND
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/fitzwilliammuseum/fitz-main-website" aria-label="Get the code">
                                Code: GPL-V3
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="container">
                <div class="row pt-2">
                    <div class="col-md-6 mx-auto">
                        <h2 class="visually-hidden">Join our conversations</h2>
                        <p class="share share-icons text-center">
                            <a aria-label="Fitzwilliam Museum instagram account" href="https://www.instagram.com/fitzmuseum_uk">
                                @svg('fab-instagram',['width'=> 48, 'height'=> 48, 'alt' => 'Instagram', "class" => "my-2 mx-2"])
                            </a>
                            <a aria-label="Fitzwilliam Museum facebook account" href="https://www.facebook.com/fitzwilliammuseum/">
                                @svg('fab-facebook',['width'=> 48, 'height'=> 48, 'alt' => 'Facebook', "class" => "my-2 mx-2"])
                            </a>
                            <a aria-label="Fitzwilliam Museum twitter account" href="https://twitter.com/FitzMuseum_UK">
                                {{-- @svg('fab-x-twitter',['width'=> 48, 'height'=> 48, 'alt' => 'X (Twitter)', "class" => "my-2 mx-2"]) --}}
                            </a>
                            <a aria-label="Fitzwilliam Museum linkedin account" href="https://www.linkedin.com/company/the-fitzwilliam-museum/">
                                @svg('fab-linkedin',['width'=> 48, 'height'=> 48, 'alt' => 'LinkedIn', "class" => "my-2 mx-2"])
                            </a>
                            <a aria-label="Watch our YouTube videos" href="https://www.youtube.com/channel/UCFwhw5uPJWb4wVEU3Y2nScg">
                                @svg('fab-youtube',['width'=> 48, 'height'=> 48, 'alt' => 'Youtube', "class" => "my-2 mx-2"])
                            </a>
                            <a aria-label="Fitzwilliam Museum sketchfab account" href="https://www.sketchfab.com/fitzwilliammuseum/">
                                <img src="{{ asset( "/images/logos/sketchfab-logo.svg") }}" alt="Sketchfab" width="48" height="48" class="my-2 mx-2 eden" />
                            </a>
                            <a aria-label="Fitzwilliam Museum github account" href="https://www.github.com/fitzwilliammuseum/">
                                @svg('fab-github',['width'=> 48, 'height'=> 48, 'alt' => 'Github', "class" => "my-2 mx-2"])
                            </a>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2 mx-auto">
                        <p class="text-center">
                            <a href="https://cam.ac.uk">
                                <img src="{{ asset('/images/logos/cambridge_university2.svg')}}"
                                    alt="The University of Cambridge" width="200" height="41.59"
                                    class="img-fluid mx-auto mb-3" loading="lazy" />
                            </a>
                            <br />
                            &copy; {{ now()->year }} The University of Cambridge
                        </p>
                    </div>
                </div>
                <button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top"
                    aria-label="Return to the top of the page">
                    <svg height="48" viewBox="0 0 48 48" width="64" xmlns="http://www.w3.org/2000/svg">
                        <path fill="black" id="scrolltop-bg" d="M0 0h48v48h-48z" />
                        <path fill="white" id="scrolltop-arrow" d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z" />
                    </svg>
                </button>
            </div>
        </div>

</footer>
