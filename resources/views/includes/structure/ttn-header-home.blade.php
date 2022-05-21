<div class="container-fluid ttn_top_banner__home">
    <div class="container-fluid ttn_header">
        <div class="row d-flex h-100 hockney_sub">
            <div class="col-md-5 px-0">
                <a href="{{ route('exhibition',['true-to-nature-open-air-painting-in-europe-1780-1870']) }}"
                   title="Exhibition details"><img
                        src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/ttn_left.jpg"
                        class="img-fluid"
                        alt="True to Nature poster image"
                    /></a>
            </div>

            <div class="col-md-7 ttn__link">
                <a href="{{ route('exhibition',['true-to-nature-open-air-painting-in-europe-1780-1870']) }}"
                   title="Exhibition details" class="hockney__link__href"> </a>
                <p class="text-center visually-hidden text-white py-3 hockney-title">True to Nature</p>
                <p class="visually-hidden text-center text-white hockney-subtitle">Free entry</p>
                <p class="visually-hidden text-center text-white py-1 hockney-dates">3rd May - 29 August 2022</p>
            </div>

        </div>
    </div>
</div>
<script>
    const hockney = document.querySelector(".hockney__link");
    const mainLink = hockney.querySelector(".hockney__link__href");
    const clickableElements = Array.from(hockney.querySelectorAll("a"));
    clickableElements.forEach((ele) =>
        ele.addEventListener("click", (e) => e.stopPropagation())
    );

    function handleClick(event) {
        const noTextSelected = !window.getSelection().toString();

        if (noTextSelected) {
            mainLink.click();
        }
    }
</script>
