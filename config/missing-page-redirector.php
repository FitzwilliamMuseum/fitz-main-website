<?php

return [
    /*
     * This is the class responsible for providing the URLs which must be redirected.
     * The only requirement for the redirector is that it needs to implement the
     * `Spatie\MissingPageRedirector\Redirector\Redirector`-interface
     */
    'redirector' => \Spatie\MissingPageRedirector\Redirector\ConfigurationRedirector::class,

    /*
     * By default the package will only redirect 404s. If you want to redirect on other
     * response codes, just add them to the array. Leave the array empty to redirect
     * always no matter what the response code.
     */
    'redirect_status_codes' => [
        \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND,
        // \Symfony\Component\HttpFoundation\Response::HTTP_GONE
    ],

    /*
     * When using the `ConfigurationRedirector` you can specify the redirects in this array.
     * You can use Laravel's route parameters here.
     */
    'redirects' => [
      # 301 redircts
      # Visiting
      '/visit/access' => '/visit-us/accessibility-and-our-facilities',
      '/visit' => '/visit-us',
      # About
      '/aboutus' => '/about-us',
      '/aboutus/history' => '/about-us/history-of-the-building-and-collections',
      # Collections
      '/collections/ceramics' => '/about-us/collections/ceramics-glass-and-enamels',
      '/collections/' => '/about-us/collections/',
      '/onlineresources' => '/research/online-resources',
      '/calendar' => '/events',
      '/calendar/whatson' => '/events',
      # Learning
      '/learningresources' => '/learning/resources',
      '/learning/youngpeople' => 'learning/young-people',
      '/learning/youngpeople/awards' => '/learning/young-people/arts-award',
      '/learning/adulteducation' => '/learning/adult-education',
      '/learning/contact' => '/learning/contact-us',
      '/learning/groups' => '/learning/group-activities',
      '/learning/schools' => 'learning/school-sessions',
      '/learning/family' => '/learning/families',
      '/learning/community' => '/learning/community-programming',
      '/learning/adults' => '/learning/adult-programming',
      # Pharos
      '/pharos' => '/objects-and-artworks',
      # News
      '/news/inside-macclesfield-psalter' => '/news/inside-the-macclesfield-psalter',
      '/news/easter-fitzwilliam' => '/news/easter-at-the-fitzwilliam',
      '/news/easter-fitz' => '/news/easter-at-the-fitzwilliam',
      '/news/christmas-fitzwilliam' => '/news/christmas-at-the-fitzwilliam-2015',
      '/news/magnificence-rome' => '/news/magnificence-of-rome',
      '/news/ra250-fitz' => '/news/ra250-at-the-fitz',
      '/news/summer-fitzwilliam' => '/news/summer-at-the-fitzwilliam',
      '/news/twilight-fitzwilliam' => '/news/twilight-at-the-fitzwilliam',
      '/news/support-us' => '/support-us',
      '/news/behind-secret-doors' => '/news/behind-the-secret-doors',
      '/news/christmas-fitzwilliam-1' => '/news/christmas-at-the-fitzwilliam-2017',
      '/news/summer-fitzwilliam-0' => '/news/summer-at-the-fitzwilliam',
      '/news/easter-fitzwilliam-1' => '/news/easter-at-the-fitzwilliam-2018',
      '/news/welcome-our-two-new-deputy-directors' => '/news/welcome-to-our-two-new-deputy-directors',
      '/news/portrait-giovanni-belzoni-donated-fitzwilliam' => '/news/portrait-of-giovanni-belzoni,-donated-to-the-fitzwilliam',
      '/news/sensualvirtual' => '/news/sensual-virtual',
      '/news/‘young-advocates’-museums' => '/news/young-advocates-in-museums',
      '/news/napoleon’s-legacy-prints' => '/news/napoleon\'s-legacy-in-prints',
      '/news/final-weeks-discoveries' => '/news/final-weeks-of-discoveries',
      '/news/easter-fitzwilliam-2' => '/news/easter-at-the-fitzwilliam-2019',
      '/news/easter-fitz-1' => '/news/easter-at-the-fitz',
      // '/news/our-winter-hours' => ['/',410],
      '/news/mannequin-parade-0' => '/news/mannequin-parade',
      '/news/follow-fitz-twitter' => '/news/follow-the-fitz-on-twitter!',
      '/news/award-saving-masterpiece' => '/news/award-for-saving-a-masterpiece',
      '/news/music-late-fitzwilliam' => '/news/music-late-at-the-fitzwilliam',
      '/news/poetry-sean-borodale' => '/news/poetry-with-sean-borodale',
      '/news/object-month-january' => '/news/object-of-the-month-january',
      '/news/not-miss-november' => '/news/not-to-miss-in-november',
      '/news/story-early-film' => '/news/the-story-of-early-film',
      '/news/summer-holidays-fitzwilliam' => '/news/summer-holidays-at-the-fitzwilliam',
      '/news/fitzwilliam-200-today' => '/news/the-fitzwilliam-is-200-today',
      '/news/delftware-fitzwilliam-museum' => '/news/delftware-in-the-fitzwilliam-museum',
      '/news/spectre-brave-alonzo' => '/news/the-spectre-of-brave-alonzo',
      '/news/verve-fitzwilliam-museum' => '/news/verve-at-the-fitzwilliam-museum',
      '/news/fitzwilliam-museum-facebook' => '/news/the-fitzwilliam-museum-on-facebook',
      '/news/festival-ideas-fitz' => '/news/the-festival-of-ideas-at-the-fitz',
      '/news/inspiring-ancient-world' => '/news/inspiring-with-the-ancient-world',
      '/news/sebastiano-restoration-nominated-award' => '/news/sebastiano-restoration-nominated-for-award',
      '/news/new-film-michael-rosen' => '/news/new-film-with-michael-rosen',
      '/news/new-podcast-fitzwilliam-museum' => '/news/new-podcast-from-the-fitzwilliam-museum',
      'news/festival-ideas-fitzwilliam-museum' => 'news/the-festival-of-ideas-at-the-fitzwilliam-museum',
      '/news/bbc-civilisations-and-fitzwilliam'  => '/news/bbc-civilisations-and-the-fitzwilliam',
      '/news/thomas-hardys-jude-obscure' => '/news/thomas-hardy\'s-jude-the-obscure',
      '/news/virtual-tour-true-nature' => '/news/virtual-tour-of-true-to-nature',
      '/news/2016-fitzwilliam-museum-bicentenary' => '/news/2016-the-fitzwilliam-museum-bicentenary',
      '/news/poussin-masterpiece-goes-tour' => '/news/poussin-masterpiece-goes-on-tour',
      '/news/last-week-silent-partners' => '/news/last-week-of-silent-partners',
      '/news/verve-returns-fitzwilliam-museum' => '/news/verve-returns-to-the-fitzwilliam-museum',
      '/news/final-stage-building-works' => '/news/final-stage-of-building-works',
      '/news/mannequins-x-ray-vision' => '/news/mannequins-with-x-ray-vision',
      '/news/colouring-competition-grown-ups' => '/news/colouring-competition-for-grown-ups',
      '/news/co-production-adc-theatre' => '/news/co-production-with-adc-theatre',
      '/news/co-production-adc' => 'the-fitzwilliam-focuses-on-the-prints-of-whistler'

    ],

];
