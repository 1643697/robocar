var mjpeg_img;
var d = new Date();

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




function Recordalert() {
  var d = new Date();
  document.getElementById("p1").innerHTML = "Recording Started     ";
  document.getElementById("p2").innerHTML = d; 
}

function FinishedRecordalert() {
  var d = new Date();
  document.getElementById("p1").innerHTML = "Recording Stopped     ";
  document.getElementById("p2").innerHTML = d; 
}