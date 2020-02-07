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
      <img id="mjpeg_dest" height="500" width="800" />
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
        else if(array_key_exists('button5', $_POST)) { 
          button5(); 
        } 
        else if(array_key_exists('button6', $_POST)) { 
          button6(); 
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
        function button5() { 
          `echo 'ca 1' >/var/www/html/FIFO`;
        } 
        function button6() { 
          `echo 'ca 0' >/var/www/html/FIFO`;
         } 

    ?> 



  <center>

    <form method="post" target="frame" >  <!-- the target send the form post to the iframe whch is hidden by css-->

        <input type="submit" name="button5" class="button" value="Record" /> 

        <input type="submit" name="button6" class="button" value="Stop Record" /> 

        <br>
        <br>
        <input type="submit" name="button1"  class="button" value="Up" /> 

        <br>

        <input type="submit" name="button2" class="button" value="Left" /> 

        <input type="submit" name="button3" class="button" value="Down" /> 

        <input type="submit" name="button4" class="button" value="Right" /> 

    </form> 
  </center>

  <iframe name="frame"></iframe>    <!---- this is a dummy iframe the form will be sent here so my page wont refresh. the css then hides the iframe--->

 </body>
</html>


