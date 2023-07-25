@section('group-visits')

    <style>
        .group-visits button {
            text-transform:uppercase;
            font-weight:bold;
            font-size:1.1em;
            padding:0;
            width:100%;
            text-align:left!important;
        }
        .card-header button::before {
            content: ">";
            float:right;
        }
        .group-visits button[aria-expanded=true]::before {
            transform:rotate(90deg);
        }
        .group-visits .card-header {
            border-bottom:#000 3px solid;
            padding:0.5em 0;
        }

    </style>
    <div class="container-fluid bg-white py-3 group-visits">
    <div class="container mb-3">
        <div class="accordion mt-2" id="accordionDirections">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <button class="btn d-block text-center" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        School Groups
                    </button>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                     data-parent="#accordionDirections">
                    <div class="card-body">
                        <p><strong>When to book</strong><br>
                        Our taught gallery sessions book up quickly and we advise booking at least three months ahead.<br>
                        We need a minimum of 28 days to organise a taught session.<br>
                        Self guided school visits must be booked no later than two weeks before the date of your visit.</p>

                        <p><strong>How to book</strong><br>

                        For additional information, including details on the schools sessions and the resource we offer, see our Planning a Schools Visit page<br>

                        To book a Schools Visit: contact our Learning team at education@fitzmuseum.cam.ac.uk or telephone 01223 332904<br>
                        We will reply to all enquiries within five working days.<br>
                        Once we have found a suitable date we will make a provisional booking and send you a booking form to complete.<br>
                        Your booking will be confirmed once we receive your completed booking form – we will then send a confirmation email.</p>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <button class="btn collapsed d-block text-center" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        University and Hei Groups
                    </button>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionDirections">
                    <div class="card-body">
                        <p>If you wish to bring a group and are enquiring from a University or HEI, please
                            visit contact our Learning team at <a href="mailto:education@fitzmuseum.cam.ac.uk">education@fitzmuseum.cam.ac.uk</a> or telephone 01223 332904 </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <button class="btn collapsed d-block text-center" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Adult Groups &amp; Tours
                    </button>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                     data-parent="#accordionDirections">
                    <div class="card-body">
                        <p><strong>When to book</strong><br>
                            Our diary books quickly and we advise booking at least three months ahead. <br>
                            Sometimes there may be availability closer to the date, but we usually require a minimum of two months to organise a tour<br>
                            Self-guided visits must be booked no later than two weeks before the date of your visit. </p>

                        <p><strong>How to book</strong><br>
                            For non-educational and non-commercial self-led adult group bookings please contact our Box Office at tickets@museums.cam.ac.uk</p>

                        <p>For community group bookings please contact our Learning team at education@fitzmuseum.cam.ac.uk</p>

                        <p>For adult groups, interested in additional elements such as a curator led tour please contact our Events team at events@fitzmuseum.cam.ac.uk to discuss options. Additional elements will incur extra charges - we will send you a booking form to complete before we can make a booking on your behalf.</p>

                        <p>We require a minimum of one month’s notice from receiving completed paperwork to be able to organise tours for adult groups and aim to reply to all enquiries within five working days.</p>

                        <p>Your booking will be confirmed when we receive your completed booking form. At this point we will send a confirmation email. Nearer to the date of your tour, usually at the beginning of the preceding month, we will send a confirmation letter with the name of the Gallery Lecturer/s allocated to your group. </p>

                        <p>An invoice will be sent from the University within seven days of your trip and is to be paid within 30 days of the date of the invoice. Payment methods will be detailed on the invoice. Please do not bring payment on the day. </p>

                        <p>Please note that we reserve the right to charge the full amount for your booking if you amend your group numbers or cancel less than 14 days before your visit or fail to turn up on the day.</p>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFour">
                    <button class="btn collapsed d-block text-center" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Self-guided visits for tour operators, language schools, summer schools & other commercial groups
                    </button>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                     data-parent="#accordionDirections">
                    <div class="card-body">

                        <p>We welcome organised self-guided group visits and require all groups to book at least two weeks in advance. During UK school term-time, language and international groups can only visit after 2.00pm. For any other enquiries about adult groups or tours please refer to the Adult groups & tours section.</p>

                        <p>We charge a £5 administration fee per person for all group visits, including travel agencies and tour operators, summer schools and EFL groups.<br>
                        Students under 18 to be accompanied by one adult per 10 students.</p>
                        <p>Maximum group size per 15 minute time slot is 25, including supervisors.</p>

                        <p><strong>How to book</strong><br>
                            You can book your self-guided commercial group visit online:<br>
                            BOOK ONLINE BUTTON  (with link to booking page)</p>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
