<!DOCTYPE html>
<html>
    <head>
        <title>RoboGuard</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Style.css">

        <script>
            function resizeIframe(obj) 
                {
                obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
                }
        </script>

    </head>

    <body>
        <h1>Car Cam</h1> 

      <iframe width=”1080” height=”720” src="/html/min.php" ></iframe> 

      <iframe src="/html/min.php" frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe> 
    
        <br>

        <a href="next.php">Cat facts</a>
        <br>
        <a href="email.php">Email Sign up</a>
        <br>

      </body>
</html>


