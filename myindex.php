<!DOCTYPE html>
<html>
    <head>
        <title>RoboGuard</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Style.css">


    </head>

    <body>
        <h1>Car Cam</h1> 

     

      <iframe src="/html/min.php" style="border: 0; width: 100%; height: 100%" scrolling="no"> </iframe>
    
      <div><img id="mjpeg_dest" onclick="toggle_fullscreen(this);" src="cam_pic.php?time=1580237946234&amp;pDelay=16666" class=""></div>

      <div class="container-fluid text-center liveimage">
         <div><img id="mjpeg_dest" onclick="toggle_fullscreen(this);" src="cam_pic.php?time=1580239409150&amp;pDelay=16666" class=""></div>
         <div id="main-buttons">
            <input id="video_button" type="button" class="btn btn-primary" value="record video start">
            <input id="image_button" type="button" class="btn btn-primary" value="record image">
            <input id="timelapse_button" type="button" class="btn btn-primary" value="timelapse start">
            <input id="md_button" type="button" class="btn btn-primary" value="motion detection start">
            <input id="halt_button" type="button" class="btn btn-danger" value="stop camera">
         </div>
      </div>
      
        <br>

        <a href="next.php">Cat facts</a>
        <br>
        <a href="email.php">Email Sign up</a>
        <br>

      </body>
</html>


