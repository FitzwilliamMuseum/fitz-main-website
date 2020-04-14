<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
<script>
pannellum.viewer('panorama', {
    "type": "equirectangular",
    "panorama": "@yield('360_image')",
    "autoLoad": true
});
</script>
