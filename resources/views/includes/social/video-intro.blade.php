<div class="container-fluid p-0" id="player">
    <div class="row no-gutters">
    <video
        poster="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/fitzwilliam-museum-main-entrance-2018_3-1.jpg"
        class="js-player no-gutters"   muted crossorigin playsinline loop>
        <source src="https://d3rppa0cay3gy1.cloudfront.net/fitzwilliam.mp4"/>
    </video>
    </div>
</div>
<link href="https://unpkg.com/plyr@3/dist/plyr.css" rel="stylesheet" />
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=es6,Array.prototype.includes,CustomEvent,Object.entries,Object.values,URL"></script>
<script src="https://unpkg.com/plyr@3"></script>
<script>
    var controls =
        [
            'play-large', // The large play button in the center
            'mute'
        ];

    const player = new Plyr('video', { controls });

    // Expose player so it can be used from the console
    window.player = player;
</script>

<style>
    .plyr {
        margin-left: 0;
    }
    .plyr__poster {
        background-size:cover;
    }
</style>
