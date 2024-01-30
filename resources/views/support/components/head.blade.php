@if (isset($hero) && $hero == true)
    <div class="container-fluid head parallax hero-su-parallax"></div>
    <div class="breadcrumbs-su">
        @include('includes.structure.breadcrumb', ['class' => 'container container-fluid'])
    </div>

    <div class="container-fluid bg-white text-black text-center">
        <div class="hero-su mx-auto  col-max-800">
            <h1 class="shout lead" id="doc-main-h1">{{ isset($title) ? $title : "Support us" }}</h1>
            <p>If you've purchased a Membership voucher in our shops or been given a Gift Membership, see how to activate it here:</p>
        </div>

        <div class="hero-su-secondary mx-auto col-max-800">
            <h2>Intro heading</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>
    </div>
@else
    <div class="breadcrumbs-su">
        @include('includes.structure.breadcrumb', ['class' => 'container container-fluid'])
    </div>

    <div class="container-fluid bg-white text-black text-center">
        <div class="hero-su mx-auto  col-max-800">
            <h1 class="shout lead" id="doc-main-h1">{{ isset($title) ? $title : "Support us" }}</h1>
            <p>If you've purchased a Membership voucher in our shops or been given a Gift Membership, see how to activate it here:</p>
        </div>
    </div>
@endif
