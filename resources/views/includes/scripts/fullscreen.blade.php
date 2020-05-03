<script type="text/javascript">
$(function() {
    var bg = $('.head');
    $('#fullscreen-btn').click(function () {
      goFullScreen(bg.attr('style', "background-image:url('@yield('hero_image')')"));
    });
});
function goFullScreen(image){

        var elem = document.getElementsByClassName("head");

        if(elem.requestFullscreen){
            elem.requestFullscreen();
        }
        else if(elem.mozRequestFullScreen){
            elem.mozRequestFullScreen();
        }
        else if(elem.webkitRequestFullscreen){
            elem.webkitRequestFullscreen();
        }
        else if(elem.msRequestFullscreen){
            elem.msRequestFullscreen();
        }
    }
</script>
