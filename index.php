<!DOCTYPE html>
<html>

  <head>
    <title>RoboGuard</title>
    <meta charset="UTF-8">
      <link rel="stylesheet" href="Style.css">
    <script src="scripts.js"></script>
  </head>

  <body onload="setTimeout('init();', 100);">
    <center>
      <h1>RoboGuard</h1>  
      <img id="mjpeg_dest" height="500" width="800" />  <!--can you make this the native resolution ----->
    </center>

  
    <?php
    //The array_key_exists() checks which button is pressed by looking at what is present in the array
    //If present it runs that buttons function
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
        else if(array_key_exists('button7', $_POST)) { 
          button7(); 
        } 
        else if(array_key_exists('button8', $_POST)) { 
          button8(); 
        }

        //Code between back ticks or (`) will be execute on the Pi
        //Depending on what button is pressed the indicated Bash script is executed 
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

        // the below functions utilize a command PIPE called FIFO
        // executing the commands send the echo result and stored it to the indicated file path
        // ca 1 and ca 0 are  keywords which start and stop video recording process  
        function button5() { 
          `echo 'ca 1' >/var/www/html/FIFO`;
        } 
        function button6() { 
          `echo 'ca 0' >/var/www/html/FIFO`;
        } 
        
        //The below function play an audi file stored within the mp3files directory
        function button7() { 
          `omxplayer ./mp3files/Countof10.mp3`;
        } 

        function button8() { 
          `omxplayer ./mp3files/Keepthechange.mp3`;
        } 

    ?> 

  <center>
    <p id="p1"> </p> <!-- Gets replaced with text showing recording/stop recording based on javascript--->
    <p id="p2"> </p> <!-- Gets replaced with text showing date based on javascript--->

    <form method="post" target="frame" >  <!-- the target send the form post to the iframe which is then hidden by css-->

        <input onclick="Recordalert()" type="submit" name="button5" class="button" value="Record" />  <!-- Calls up javascript to give user feedback--->

        <input onclick="FinishedRecordalert()" type="submit" name="button6" class="button" value="Stop Record" /> 

        <br>
        <br>
        <input type="submit" name="button7" class="button" value="Audio 1" /> 

        <input type="submit" name="button8" class="button" value="Audio 2" /> 

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


