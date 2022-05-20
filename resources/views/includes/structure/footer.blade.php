<!-- Footer logos -->
<!--suppress HtmlUnknownAnchorTarget -->
<div class="container-fluid bg-white p-2 container-fluid bg-white border-cambridge">
    <div class="col-md-12 mx-auto">
        <div class="row justify-content-center mb-4">
            <div class="col-md-2 col-sm-2 text-center">
                <a href="https://www.museums.cam.ac.uk">
                    <img class="mx-auto my-2"
                         loading="lazy"
                         width="200"
                         alt="University of Cambridge Museums logo"
                         src="{{ asset('/images/logos/ucm_logo_black_white.png') }}"
                    />
                </a>
            </div>
            <div class="col-md-2 col-sm-2 text-center">
                <a href="https://www.cambridge.gov.uk/">
                    <img class="mx-auto my-2"
                         loading="lazy"
                         width="60"
                         alt="Cambridge City Council logo"
                         src="{{ asset('/images/logos/camcity_logo.png') }}"
                    />
                </a>
            </div>
            <div class="col-md-2 col-sm-2 text-center">
                <a href="https://www.artscouncil.org.uk/">
                    <img class="mx-auto my-2"
                         alt="Arts Council England Logo"
                         src="{{ asset('/images/logos/artscouncil_grant.png')}}"
                         loading="lazy"
                         width="200"
                    />
                </a>
            </div>
            <div class="col-md-2 col-sm-2 text-center">
                <a href="https://re.ukri.org/">
                    <img class="mx-auto my-2"
                         alt="Research England logo"
                         loading="lazy"
                         width="200"
                         src="{{ asset('images/logos/UKRI_RE-Logo_Horiz-RGB.png')}}"
                    />
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Sponsor -->
<div class="container-fluid bg-white p-2 container-fluid bg-white border-cambridge">
    <div class="col-md-12 mx-auto">
        <div class="row justify-content-center mb-4">
            <div class="col-md-2 col-sm-2">
                <a href="https://www.brewin.co.uk/individuals/our-offices/cambridge">
                    <img class="mx-auto d-block mb-4"
                         alt="Brewin Dolphin Logo"
                         width="300"
                         src="{{ asset('/images/logos/brewin-dolphin.jpg')}}"
                         loading="lazy"/>
                </a>
            </div>
        </div>
    </div>
</div>

<!--- Footer stuff -->

<footer class="text-black">
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="my-2 mx-auto footer__info p-4">
                        <h3 class="sr-only">Contact us</h3>
                        <p>
                            The Fitzwilliam Museum<br/>
                            Trumpington Street<br/>
                            Cambridge<br/>
                            CB2 1RB<br/>
                            Switchboard: +44 (0)1223 332 900<br/>
                            Box office: +44 (0)1223 333 230<br/>
                            <i class="fas fa-ticket-alt mr-1" aria-hidden="true" title="ticket"></i> <a
                                href="mailto:tickets@museums.cam.ac.uk">tickets@museums.cam.ac.uk</a><br/>
                            What3Words: <span class="w3w"><a
                                    href="https://map.what3words.com/lofts.puzzle.given"
                                    aria-label="What3Words location phrase">lofts.puzzle.given</a></span>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="my-2 mx-auto footer__info p-4">
                        <h3 class="sr-only">Useful links</h3>
                        <ul class="share">
                            <li>
                                <a href="https://www.museums.cam.ac.uk/"
                                   aria-label="The University of Cambridge museums site">University
                                    of Cambridge Museums</a>
                            </li>
                            <li>
                                <a href="{{ route('landing-section', ['about-us', 'terms-of-use-of-our-website'])}}"
                                   aria-label="Website terms and conditions">Website Terms of Use</a>
                            </li>
                            <li>
                                <a href="{{ route('landing-section', ['about-us', 'privacy-and-cookies'])}}">Cookies,
                                    privacy &
                                    accessibility</a>
                            </li>
                            <li>
                                <a aria-label="Contact the museum"
                                   href="{{ route('landing-section', ['about-us', 'contact-us'])}}">Contact us</a>
                            </li>
                            <li>
                                <a aria-label="Work for us" href="{{ route('vacancies')}}">Work for us</a>
                            </li>
                            <li>
                                <a href="https://www.registrarysoffice.admin.cam.ac.uk/governance-and-strategy/anti-slavery-and-anti-trafficking"
                                   aria-label="Modern Slavery Act statement of compliance">Modern Slavery Act
                                    Statement</a>
                            </li>
                            <li>
                                <a href="{{ route('landing-section', ['about-us', 'terms-of-sale'])}}"
                                   aria-label="Terms of sale for tickets">Terms of Sale</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="my-2 mx-auto footer__info p-4">
                        <h3 class="sr-only">About the University and licenses</h3>
                        <ul class="share">
                            <li><a href="https://cam.ac.uk/about-the-university/how-the-university-and-colleges-work"
                                   aria-label="How Collegiate Cambridge works">The University and Colleges</a></li>
                            <li><a href="https://cam.ac.uk/about-the-university/visiting-the-university"
                                   aria-label="How to visit the university">Visiting the University</a></li>
                            <li><a href="https://www.philanthropy.cam.ac.uk/give-now"
                                   aria-label="How to support the University">Give to Cambridge</a></li>
                            <li>
                                <a href="https://creativecommons.org/licenses/by/4.0/"
                                   aria-label="CC-BY license terms" >
                                    Content: CC-BY
                                </a>
                            </li>
                            <li>
                                <a href="https://creativecommons.org/share-your-work/public-domain/cc0/"
                                   aria-label="CC0 license terms" >
                                    Metadata: CC0
                                </a>
                            </li>
                            <li>
                                <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/"
                                   aria-label="CC-BY-NC-ND license terms" >
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
            </div>
        </div>

    </div>

    <div class="container">
        <div class="row pt-2">
            <div class="col-md-6 mx-auto">
                <h3 class="sr-only">Join our conversations</h3>
                <p class="share text-center">
                    <a aria-label="Fitzwilliam Museum twitter account" href="https://twitter.com/FitzMuseum_UK">
                        <i class="fab fa-twitter fa-3x p-2"></i>
                    </a>
                    <a aria-label="Fitzwilliam Museum instagram account" href="https://www.instagram.com/fitzmuseum_uk">
                        <i class="fab fa-instagram fa-3x p-2"></i>
                    </a>
                    <a aria-label="Fitzwilliam Museum facebook account"
                       href="https://www.facebook.com/fitzwilliammuseum/">
                        <i class="fab fa-facebook fa-3x p-2"></i>
                    </a>
                    <a aria-label="Fitzwilliam Museum linkedin account"
                       href="https://www.linkedin.com/company/the-fitzwilliam-museum/">
                        <i class="fab fa-linkedin fa-3x p-2"></i>
                    </a>
                    <a aria-label="Fitzwilliam Museum github account"
                       href="https://www.github.com/fitzwilliammuseum/">
                        <i class="fab fa-github fa-3x p-2"></i>
                    </a>
                    <a aria-label="Watch our YouTube videos" href="https://www.youtube.com/channel/UCFwhw5uPJWb4wVEU3Y2nScg">
                        <i class="fab fa-youtube fa-3x p-2"></i>
                    </a>
                    <a aria-label="Fitzwilliam Museum news feed" href="{{route("feeds.news")}}">
                        <i class="fas fa-rss fa-3x  p-2"></i>
                    </a>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-2 mx-auto">
                <p class="text-center">
                    <a href="https://cam.ac.uk">
                        <img src="{{ asset('/images/logos/cambridge_university2.svg')}}"
                             alt="The University of Cambridge logo"
                             width="200"
                             height="41.59"
                             class="img-fluid mx-auto mb-3"
                             loading="lazy"
                        />
                    </a>
                    <br/>
                    &copy; {{ now()->year }} The University of Cambridge</p>
            </div>
        </div>
    </div>
    <a href="#0" class="cd-top js-cd-top">Top</a>
</footer>
