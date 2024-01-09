    {{-- FAQ --}}
    <div class="container-fluid col-max-800 faq">
        <div class="container faq-container">
            <h3 class="faq-title">FAQ</h3>
            <div class="accordion mt-2" id="accordionDirections">
                <div class="card faq-card">
                    <div class="card-header faq-card-header" id="headingOne">
                        <button class="faq-card-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Where does the money go?
                            @svg('fas-chevron-down', ['width' => '25px', 'height' => '25px'])
                        </button>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                        data-parent="#accordionDirections">
                        <div class="card-body">
                            Money goes to the bank.
                        </div>
                    </div>
                </div>
                <div class="card faq-card">
                    <div class="card-header faq-card-header" id="headingTwo">
                        <button class="faq-card-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Can my money go to a specific collection?
                            @svg('fas-chevron-down', ['width' => '25px', 'height' => '25px'])
                        </button>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionDirections">
                        <div class="card-body">
                            Yes, you can specify where your money goes.
                        </div>
                    </div>
                </div>
                <div class="card faq-card">
                    <div class="card-header faq-card-header" id="headingThree">
                        <button class="faq-card-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Gift aid?
                            @svg('fas-chevron-down', ['width' => '25px', 'height' => '25px'])
                        </button>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionDirections">
                        <div class="card-body">
                            Yes, you can specify where your money goes.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
