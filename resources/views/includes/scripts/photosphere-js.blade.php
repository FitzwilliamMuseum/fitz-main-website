<script type="text/javascript" src="{{ asset('js/pannellum.js') }}"></script>
<script>
    pannellum.viewer('panorama', {
        "type": "equirectangular",
        "panorama": "@yield('360_image_url')",
        "autoLoad": true
    });

    // Accessibility attributes for controls
    document.addEventListener('DOMContentLoaded', function () {
        // Zoom In
        const zoomIn = document.querySelector('.pnlm-zoom-in');
        if (zoomIn) {
            zoomIn.setAttribute('tabindex', '0');
            zoomIn.setAttribute('role', 'button');
            zoomIn.setAttribute('aria-label', 'Zoom in');
        }
        // Zoom Out
        const zoomOut = document.querySelector('.pnlm-zoom-out');
        if (zoomOut) {
            zoomOut.setAttribute('tabindex', '0');
            zoomOut.setAttribute('role', 'button');
            zoomOut.setAttribute('aria-label', 'Zoom out');
        }
        // Fullscreen Toggle
        const fullscreen = document.querySelector('.pnlm-fullscreen-toggle-button');
        if (fullscreen) {
            fullscreen.setAttribute('tabindex', '0');
            fullscreen.setAttribute('role', 'button');
            fullscreen.setAttribute('aria-label', 'Toggle fullscreen');
            fullscreen.style.display = 'block';
        }
    });
</script>
