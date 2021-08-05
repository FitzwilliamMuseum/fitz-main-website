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
    ],

    /*
     * When using the `ConfigurationRedirector` you can specify the redirects in this array.
     * You can use Laravel's route parameters here.
     */
    'redirects' => [
      # 301 redircts
      '/visit/access' => '/visit-us/accessibility-and-our-facilities',
      '/visit' => '/visit-us',
      '/aboutus/history' => '/about-us/history-of-the-building-and-collections',
      '/collections/ceramics' => '/about-us/collections/ceramics-glass-and-enamels',
      '/collections/' => '/about-us/collections/',
      '/onlineresources' => '/research/online-resources',
      '/calendar' => '/events',
      '/calendar/whatson' => '/events',
      '/learningresources' => '/learning/resources',
      '/learning/youngpeople' => 'learning/young-people',
      '/learning/youngpeople/awards' => '/learning/young-people/arts-award',
      '/learning/adulteducation' => '/learning/adult-education',
      '/learning/contact' => '/learning/contact-us',
      '/learning/groups' => '/learning/group-activities',
      '/learning/schools' => 'learning/school-sessions',
      '/learning/family' => '/learning/families',
      '/aboutus' => '/about-us',
      '/news/welcome-our-two-new-deputy-directors' => '/news/welcome-to-our-two-new-deputy-directors',
      '/news/portrait-giovanni-belzoni-donated-fitzwilliam' => '/news/portrait-of-giovanni-belzoni,-donated-to-the-fitzwilliam',
      '/news/sensualvirtual' => '/news/sensual-virtual',
      '/pharos' => '/objects-and-artworks',
      '/learning/adults' => '/learning/adult-programming',
      '/news/inside-macclesfield-psalter' => '/news/inside-the-macclesfield-psalter',
      '/news/easter-fitzwilliam' => '/news/easter-at-the-fitzwilliam',
      '/news/easter-fitz' => '/news/easter-at-the-fitzwilliam',
      '/news/christmas-fitzwilliam' => '/news/christmas-at-the-fitzwilliam-2015',
      '/news/magnificence-rome' => '/news/magnificence-of-rome',
      '/news/ra250-fitz' => '/news/ra250-at-the-fitz',
      
    ],

];
