<div class="payment">
    <h2>{{ isset($title) ? $title : '' }}</h2>
    <div class="payment-grid">
        <ul class="grid-container">
            <li class="grid-item">
                <div class="grid-card">
                    <h3>Individual gift membership</h3>
                    <p>Buy for yourself or give as a gift</p>
                    <p> <span>&pound; 30</span>a year.</p>
                    <a href="#">
                        Buy
                        @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                    </a>
                </div>
            </li>
            <li class="grid-item">
                <div class="grid-card">
                    <h3>Joint gift membership</h3>
                    <p>Membership for yourself and an unnamed Guest. Buy for yourself or give as a gift.</p>
                    <p> <span>&pound; 89</span>a year.</p>
                    <a href="#">
                        Buy
                        @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                    </a>
                </div>
            </li>
            <li class="grid-item">
                <div class="grid-card">
                    <h3> Life membership </br>(individual)</h3>
                    <p>Buy for yourself or give as a gift</p>
                    <p> <span>&pound; 500</span>a year.</p>
                    <a href="#">
                        Buy
                        @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                    </a>
                </div>
            </li>
            <li class="grid-item">
                <div class="grid-card">
                    <h3> Life membership </br>(joint)</h3>
                    <p>Buy for yourself or give as a gift</p>
                    <p> <span>&pound; 30</span>a year.</p>
                    <a href="#">
                        Buy
                        @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
