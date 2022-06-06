<div class="container-fluid p-0" id="player">
    <div class="row no-gutters">
    <video
        poster="{{ env('CONTENT_STORE') }}Mosaic Floor_Founders Entrance_201702_mfj22_mas-2.jpg"
        class="js-player no-gutters" muted crossorigin playsinline loop>
        <source src="https://d3rppa0cay3gy1.cloudfront.net/fitzwilliam.mp4"/>
    </video>
    </div>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.7.2/plyr.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.7.2/plyr.min.js"></script>
<script>
    const controls =
        [
            'play-large',
            'mute',
            'play'
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
