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
        function button1() { 
            echo "This is UP that is selected"; 
            $output = `./hello.sh`;
            echo "<div>$output</div>";
        } 
        function button2() { 
            echo "This is Button2 that is selected"; 
        } 
        function button3() { 
            echo "This is Button3 that is selected"; 
        } 
        function button4() { 
            echo "This is Button4 that is selected"; 
        } 
    ?> 
  
    <form method="post"> 

        <input type="submit" name="button1"  class="button" value="Button1" /> 
          
        <input type="submit" name="button2" class="button" value="Button2" /> 

        <input type="submit" name="button3" class="button" value="Button3" /> 

        <input type="submit" name="button4" class="button" value="Button4" /> 

    </form> 



 </body>
</html>


