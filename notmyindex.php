<html><head>
      <meta name="viewport" content="width=550, initial-scale=1">
      <title>RPi Cam Control v6.6.7: mycam@raspberrypi</title>
      <link rel="stylesheet" href="css/style_minified.css">
      <link rel="stylesheet" href="css/es_Default.css">
      <script src="js/style_minified.js"></script>
      <script src="js/script.js"></script>
      <script src="js/pipan.js"></script>
   </head>


   <body onload="setTimeout('init(0, 60, 1);', 100);">
      <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <div class="container">
            <div class="navbar-header">
               <a class="navbar-brand" href="#">RPi Cam Control v6.6.7: mycam@raspberrypi</a>
            </div>
         </div>
      </div>
	        <div class="container-fluid text-center liveimage">
         <div><img id="mjpeg_dest" onclick="toggle_fullscreen(this);" src="cam_pic.php?time=1580237211861&amp;pDelay=16666"></div>
      </div>
 

</body></html>