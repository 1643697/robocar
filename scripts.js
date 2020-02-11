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
  var str = "Recording Started";
  var result = str.fontcolor("green");
  document.getElementById("p1").innerHTML = result;
  document.getElementById("p2").innerHTML = d; 
}

function FinishedRecordalert() {
  var d = new Date();
  var str1 = "Recording Stopped ";
  var result1 = str1.fontcolor("red");
  document.getElementById("p1").innerHTML = result1;
  document.getElementById("p2").innerHTML = d; 
}