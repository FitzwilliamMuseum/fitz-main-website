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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dui est, laoreet at justo ut, varius malesuada diam. Morbi pharetra, dui finibus egestas rutrum, quam nisl aliquet tellus, at rhoncus nisl ligula vitae metus. Suspendisse scelerisque nibh condimentum ornare pulvinar. Ut id odio mattis, eleifend elit vitae, hendrerit magna. Vivamus eget eros faucibus est auctor dictum. Nunc eget egestas ex, vitae mollis quam. Proin tristique placerat neque, in mattis ex molestie vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur vel erat quis felis euismod mattis et et neque. Vestibulum elementum quis metus tincidunt bibendum. Duis quis tellus vel mauris varius condimentum. Quisque nec enim eleifend, eleifend sapien et, tincidunt turpis. In varius aliquam odio, sed lobortis massa euismod quis. Vestibulum vel elit ut justo lobortis tempus a in dui.
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dui est, laoreet at justo ut, varius malesuada diam. Morbi pharetra, dui finibus egestas rutrum, quam nisl aliquet tellus, at rhoncus nisl ligula vitae metus. Suspendisse scelerisque nibh condimentum ornare pulvinar. Ut id odio mattis, eleifend elit vitae, hendrerit magna. Vivamus eget eros faucibus est auctor dictum. Nunc eget egestas ex, vitae mollis quam. Proin tristique placerat neque, in mattis ex molestie vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur vel erat quis felis euismod mattis et et neque. Vestibulum elementum quis metus tincidunt bibendum. Duis quis tellus vel mauris varius condimentum. Quisque nec enim eleifend, eleifend sapien et, tincidunt turpis. In varius aliquam odio, sed lobortis massa euismod quis. Vestibulum vel elit ut justo lobortis tempus a in dui.
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dui est, laoreet at justo ut, varius malesuada diam. Morbi pharetra, dui finibus egestas rutrum, quam nisl aliquet tellus, at rhoncus nisl ligula vitae metus. Suspendisse scelerisque nibh condimentum ornare pulvinar. Ut id odio mattis, eleifend elit vitae, hendrerit magna. Vivamus eget eros faucibus est auctor dictum. Nunc eget egestas ex, vitae mollis quam. Proin tristique placerat neque, in mattis ex molestie vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur vel erat quis felis euismod mattis et et neque. Vestibulum elementum quis metus tincidunt bibendum. Duis quis tellus vel mauris varius condimentum. Quisque nec enim eleifend, eleifend sapien et, tincidunt turpis. In varius aliquam odio, sed lobortis massa euismod quis. Vestibulum vel elit ut justo lobortis tempus a in dui.
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dui est, laoreet at justo ut, varius malesuada diam. Morbi pharetra, dui finibus egestas rutrum, quam nisl aliquet tellus, at rhoncus nisl ligula vitae metus. Suspendisse scelerisque nibh condimentum ornare pulvinar. Ut id odio mattis, eleifend elit vitae, hendrerit magna. Vivamus eget eros faucibus est auctor dictum. Nunc eget egestas ex, vitae mollis quam. Proin tristique placerat neque, in mattis ex molestie vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur vel erat quis felis euismod mattis et et neque. Vestibulum elementum quis metus tincidunt bibendum. Duis quis tellus vel mauris varius condimentum. Quisque nec enim eleifend, eleifend sapien et, tincidunt turpis. In varius aliquam odio, sed lobortis massa euismod quis. Vestibulum vel elit ut justo lobortis tempus a in dui.
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
