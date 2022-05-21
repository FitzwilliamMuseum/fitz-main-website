<div class="container-fluid hockney_top_banner">
    <div class="container-fluid mt-5 hockney_header">
        <div class="row d-flex h-100 hockney_sub">
            <div class="col-md-5 px-0">
                <a href="{{ route('exhibition',['hockneys-eye-the-art-and-technology-of-depiction']) }}"
                   title="Exhibition details"><img
                        src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/david-hockney_21a14-self-portrait-1-.jpg"
                        class="img-fluid"
                        alt="Self portrait of David Hockney"
                    /></a>
            </div>

            <div class="col-md-7 hockney__link">
                <a href="{{ route('exhibition',['hockneys-eye-the-art-and-technology-of-depiction']) }}"
                   title="Exhibition details" class="hockney__link__href"> </a>
                <p class="text-center visually-hidden text-white py-3 hockney-title">Hockney's Eye</p>
                <p class="visually-hidden text-center text-white hockney-subtitle">The Art and Technology of Depiction</p>
                <p class="visually-hidden text-center text-white py-1 hockney-dates">15 March – 29 August 2022</p>
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
