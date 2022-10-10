<div class="container-fluid defaced_top_banner">
    <div class="container-fluid mt-5 defaced_header">
        <div class="row d-flex h-100 defaced_sub">
            <div class="col-md-12 px-0">
                <a href="{{ route('exhibition',['defaced']) }}" title="Exhibition details">
                    <img
                        src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/2657_Fitzwilliam_Defaced_WebBanner_Artwork.jpg"
                        class="img-fluid temporary-banner-image"
                        alt=""
                        height="1000"
                        width="2000"
                    />
                </a>
            </div>

            <div class="visually-hidden">
                <p class="text-center text-white py-3 hockney-title">11 October - 8 January 2023</p>
                <p class="text-center text-white hockney-subtitle">Free entry</p>
                <p class="text-center text-white py-1 hockney-dates">#Defaced</p>
                <a href="{{ route('exhibition',['defaced']) }}" class="hockney__link__href">View exhibition details</a>
            </div>

        </div>
    </div>
</div>

<style>
    .temporary-banner-image {
        width: 100%;
    }

    @supports (object-fit: cover) {
        @media screen and (max-width: 900px) {
            .temporary-banner-image {
                max-width: none;
                margin-left: -100%;
                margin-right: -100%;
                margin-top: -40%;
                object-fit: cover;
                width: 300%;
            }
        }
    }
</style>
