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
      
      <div id="secondary-buttons" class="container-fluid text-center">
                           <a href="preview.php" class="btn btn-default">Download Videos and Images</a>
         &nbsp;&nbsp;
         <a href="motion.php" class="btn btn-default">Edit motion settings</a>&nbsp;&nbsp;         <a href="schedule.php" class="btn btn-default">Edit schedule settings</a>
      </div>
    
      <div class="container-fluid text-center">
         <div class="panel-group" id="accordion">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h2 class="panel-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Camera Settings</a>
                  </h2>
               </div>
               <div id="collapseOne" class="panel-collapse collapse">
                  <div class="panel-body">
                     <table class="settingsTable">
                        <tbody><tr>
                           <td>Resolutions:</td>
                           <td>Load Preset: <select onchange="set_preset(this.value)">
								                                 <option value="1920 1080 25 25 2592 1944">Select option...</option>
                                 <option value="1920 1080 25 25 2592 1944">Full HD 1080p 16:9</option>
                                 <option value="1280 0720 25 25 2592 1944">HD-ready 720p 16:9</option>
                                 <option value="1296 972 25 25 2592 1944">Max View 972p 4:3</option>
                                 <option value="768 576 25 25 2592 1944">SD TV 576p 4:3</option>
                                 <option value="1920 1080 01 30 2592 1944">Full HD Timelapse (x30) 1080p 16:9</option>
								                               </select><br>
                       
               </div>
            </div>
         </div>
      </div>
         

</body></html>