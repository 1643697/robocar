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
    //The array_key_exists() is an inbuilt function of PHP and is used to check whether a 
    //specific key or index is present inside an array or not
        if(array_key_exists('button1', $_POST)) { 
            button1(); 
        } 
        else if(array_key_exists('button2', $_POST)) { 
            button2(); 
        } 
        else if(array_key_exists('button3', $_POST)) { 
          button3(); 
        } 
        else if(array_key_exists('button4', $_POST)) { 
          button4(); 
        } 
        else if(array_key_exists('record', $_POST)) { 
          record(); 
        } 
        else if(array_key_exists('stoprecord', $_POST)) { 
          stoprecord(); 
        } 

        
        function button1() { 
            $output = `./control/up.sh`;
            echo "<div>$output</div>";
        } 
        function button2() { 
            $output = `./control/left.sh`;
            echo "<div>$output</div>"; 
        } 
        function button3() { 
            $output = `./control/down.sh`;
            echo "<div>$output</div>";
        } 
        function button4() { 
            $output = `./control/right.sh`;
            echo "<div>$output</div>";
        } 

        function record() { 
          $output = `./control/down.sh`;
          echo "<div>$output</div>";
        } 
        function stoprecord() { 
            $output = `./control/right.sh`;
            echo "<div>$output</div>";
        } 
    ?> 





  <center>

      <form method="post" target "frame" >  <!-- the target send the form post to the iframe whch is hidden by css-->

        <input type="submit" name="record"  class="button" value="record" /> 

        <input type="submit" name="stoprecord" class="button" value="stoprecord" /> 

        <input type="submit" name="button1"  class="button" value="Button1" /> 

        <br>

        <input type="submit" name="button2" class="button" value="Button2" /> 

        <input type="submit" name="button3" class="button" value="Button3" /> 

        <input type="submit" name="button4" class="button" value="Button4" /> 

    </form> 
  </center>

  <iframe name="frame"></iframe>    <!---- this is a dummy iframe the form will be sent here so my page wont refresh. the css then hides the iframe--->

 </body>
</html>


