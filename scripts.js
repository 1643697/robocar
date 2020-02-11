var mjpeg_img;

function reload_img () {
  mjpeg_img.src = "cam_pic.php?time=" + new Date().getTime();
}
function error_img () {
  setTimeout("mjpeg_img.src = 'cam_pic.php?time=' + new Date().getTime();", 100);
}
function init() {
  mjpeg_img = document.getElementById("mjpeg_dest");
  mjpeg_img.onload = reload_img;
  mjpeg_img.onerror = error_img;
  reload_img();
}

$( "#success-btn" ).click(function() {
  $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
});

$( "#failure-btn" ).click(function() {
  $( "div.failure" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
});