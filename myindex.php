<!DOCTYPE html>
<html>

  <head>
    <title>RoboGuard</title>
    <meta charset="UTF-8">
      <link rel="stylesheet" href="Style.css">
    <script src="script_min.js"></script>
  </head>

  <body onload="setTimeout('init();', 100);">
    <center>
      <h1>Car Cam</h1> 
      <div><img id="mjpeg_dest" /></div>
    </center>

    <?php
        if(array_key_exists('button1', $_POST)) { 
            button1(); 
        } 
        else if(array_key_exists('button2', $_POST)) { 
            button2(); 
        } 
        function button1() { 
            echo "This is Button1 that is selected"; 
            $output = `ls -lart`;
            echo "<div>$output</div>";
        } 
        function button2() { 
            echo "This is Button2 that is selected"; 
        } 
    ?> 
  
    <form method="post"> 
        <input type="submit" name="button1"
                class="button" value="Button1" /> 
          
        <input type="submit" name="button2"
                class="button" value="Button2" /> 
    </form> 



 </body>
</html>


