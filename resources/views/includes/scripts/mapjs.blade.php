<script>
window.addEventListener('LaravelMaps:MapInitialized', function (event) {
  var element = event.detail.element;
  var map = event.detail.map;
  map.scrollWheelZoom.disable();
});
</script>
