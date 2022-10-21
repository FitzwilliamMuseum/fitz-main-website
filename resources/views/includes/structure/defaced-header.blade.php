<div class="container-fluid defaced_top_banner">
    <div class="container-fluid defaced_header">
        <div class="row d-flex h-100 defaced_sub">
            <div class="col-md-12 px-0">
                <a href="{{ route('exhibition',['defaced']) }}" title="Exhibition details">
                    <picture>
                        <source srcset="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/2657_Fitzwilliam_Defaced_WebsiteDesktopBanner.jpg" media="(min-width: 800px)" />
                        <img src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/2657_Fitzwilliam_Defaced_WebsiteMobileBanner.jpg" alt="" height="700" width="2000" class="img-fluid temporary-banner-image" />
                    </picture>
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
    .defaced_top_banner {
        /**
         * Hide the overflowing image
         */
        overflow: hidden;
    }

    {{--
    We have to override the margin-top here as there isn't a utility class
    larger than mt-5, and the client was complaining of the global header
    overlapping the new hero that we added

    @TODO: We need to implement a long term solution to this issue
    --}}
    .defaced_header {
        margin-top: 84px !important;
    }

    .temporary-banner-image {
        width: 100%;
    }
</style>
