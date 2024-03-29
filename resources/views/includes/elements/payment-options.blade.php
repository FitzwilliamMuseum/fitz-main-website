@if (isset($variant) && $variant === 'the-marlay-group')
    <div class="container mt-4 p-5">
        <div class="card mt-4 col-md-12">
            <div class="row mb-4 no-gutters">
                <h3 class="lead p-heading p-heading--single">Become a Marlay Group Patron</h3>
                <hr/>
                <div class="col-md-6 border d-flex rounded text-center p-container p-container--single">
                    <figure class="fluid">
                        <img class="img-fluid p-image p-image--single" src="/images/payment-options/the-marlay-group.jpg" alt="person in museum"/>
                    </figure>
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <a href="{{ env('TESSITURA_BOOKING_DOMAIN') }}donate/contribute1?ct=1" class="btn btn-info btn-credit">Credit/Debit Card &pound;1,500</a>
                    <a href="{{ env('TESSITURA_BOOKING_DOMAIN') }}components/precart?exec=true&procedureId=54&contrib_type=1&is_dd=y" class="mt-3 btn btn-hockney btn-direct">Direct Debit &pound;1,500</a>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="container mt-4 p-5">
        <div class="card mt-4 col-md-12">
            <div class="row mb-4 no-gutters">
                <h3 class="lead p-heading p-heading--single">Friends Individual</h3>
                <hr/>
                <div class="col-md-4 border d-flex rounded text-center p-container p-container--single">
                    <figure class="fluid">
                        <img class="img-fluid p-image p-image--single" src="/images/payment-options/friends_individual.jpeg" alt="person in museum"/>
                    </figure>
                </div>
                <div class="col-md-8 d-flex flex-column justify-content-center">
                    <a href="{{ env('TESSITURA_BOOKING_DOMAIN') }}donate/contribute1?ct=2" class="btn btn-info btn-credit">Credit/Debit Card &pound;30/yr</a>
                    <a href="{{ env('TESSITURA_BOOKING_DOMAIN') }}components/precart?exec=true&procedureId=54&contrib_type=2&is_dd=Y" class="mt-3 btn btn-hockney btn-direct">Direct Debit &pound;30/yr</a>
                </div>
            </div>

            <div class="mt-4 row mb-4 no-gutters">
                <h3 class="lead p-heading p-heading--joint">Joint Friends</h3>
                <hr/>
                <div class="col-md-4 border d-flex rounded text-center p-container p-container--joint">
                    <figure class="fluid">
                        <img class="img-fluid p-image p-image--joint" src="/images/payment-options/friends_joint.jpeg" alt="people talking"/>
                    </figure>
                </div>
                <div class="col-md-8 d-flex flex-column justify-content-center">
                    <a href="{{ env('TESSITURA_BOOKING_DOMAIN') }}donate/contribute1?ct=3" class="btn btn-info btn-credit">Credit/Debit Card &pound;48/yr</a>
                    <a href="{{ env('TESSITURA_BOOKING_DOMAIN') }}components/precart?exec=true&procedureId=54&contrib_type=3&is_dd=y" class="mt-3 btn btn-hockney btn-direct">Direct Debit &pound;48/yr</a>
                </div>
            </div>

            <div class="row mb-4 no-gutters">
                <h3 class="lead p-heading p-heading--single">Friends Individual Life</h3>
                <hr/>
                <div class="col-md-4 border d-flex rounded text-center p-container p-container--single">
                    <figure class="fluid">
                        <img class="img-fluid p-image p-image--single" src="/images/payment-options/friends_individual_life.jpeg" alt="person taking a picture"/>
                    </figure>
                </div>
                <div class="col-md-8 d-flex flex-column justify-content-center">
                    <a href="{{ env('TESSITURA_BOOKING_DOMAIN') }}donate/contribute1?ct=4" class="btn btn-info btn-credit">Credit/Debit Card &pound;450</a>
                </div>
            </div>

            <div class="row mb-4 no-gutters">
                <h3 class="lead p-heading p-heading--single">Joint Friends Life</h3>
                <hr/>
                <div class="col-md-4 border d-flex rounded text-center p-container p-container--single">
                    <figure class="fluid">
                        <img class="img-fluid p-image p-image--single" src="/images/payment-options/friends_joint_life.jpeg" alt="A couple in museum"/>
                    </figure>
                </div>
                <div class="col-md-8 d-flex flex-column justify-content-center">
                    <a href="{{ env('TESSITURA_BOOKING_DOMAIN') }}donate/contribute1?ct=5" class="btn btn-info btn-credit">Credit/Debit Card &pound;750</a>
                </div>
            </div>
        </div>
    </div>
@endif
