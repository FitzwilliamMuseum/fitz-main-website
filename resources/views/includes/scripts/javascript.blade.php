<script src="{{ mix('js/app.js') }}"></script>

@hasSection('audio-guide')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.5.10/plyr.min.js"></script>
    <script defer type="text/javascript" src="{{ asset("/js/plyr-controls.js") }}"></script>
@endif

@yield('plyr-js')
@hasSection('height-test')
    @yield('height-test')
@endif
<script>
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    const popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
</script>
<script type="text/plain" data-cookiecategory="analytics" async  src="https://www.googletagmanager.com/gtag/js?id={{ env('APP_GOOGLE_ANALYTICS') }}"></script>

<script type="text/plain" data-cookiecategory="analytics">
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', '{{ env('APP_GOOGLE_ANALYTICS') }}');
</script>
@hasSection('map')
    @mapscripts
    @include('includes.scripts.mapjs')
@endif

@stack('fitzwilliamScripts')

{{--
    @TODO: Modify this code so that it works by launching the modal 
    programmatically rather than by triggering a click event on a button
--}}

<?php

$date = new DateTime();
$start = new DateTime('2022-12-23 17:00');
$end = new DateTime('2023-01-02 17:00');

if ($date > $start && $date < $end):
?>
<script>
    var modalButton = document.getElementById('launchEmergencyModalButton');
    modalButton.click();
</script>
<?php endif; ?>
