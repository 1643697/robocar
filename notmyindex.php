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

         <div id="main-buttons">


            <input id="video_button" type="button" class="btn btn-primary" value="record video start">
            <input id="image_button" type="button" class="btn btn-primary" value="record image">
            <input id="timelapse_button" type="button" class="btn btn-primary" value="timelapse start">
            <input id="md_button" type="button" class="btn btn-primary" value="motion detection start">
            <input id="halt_button" type="button" class="btn btn-danger" value="stop camera">

         </div>
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
                              Custom Values:<br>
                              Video res: <input type="number" size="4" id="video_width" value="1920" style="width:4em;">x<input type="number" size="4" id="video_height" value="1080" style="width:4em;">px<br>
                              Video fps: <input type="number" size="3" id="video_fps" value="60" style="width:3em;">recording, <input type="number" size="3" id="MP4Box_fps" value="25" style="width:3em;">boxing<br>
                              Image res: <input type="number" size="4" id="image_width" value="2592" style="width:4em;">x<input type="number" size="4" id="image_height" value="1944" style="width:4em;">px<br>
                              <input type="button" value="OK" onclick="set_res();">
                           </td>
                        </tr>
                                                <tr>
                           <td>Timelapse-Interval (0.1...3200):</td>
                           <td><input type="number" size="4" id="tl_interval" value="2" style="width:4em;">s <input type="button" value="OK" onclick="send_cmd('tv ' + 10 * document.getElementById('tl_interval').value)"></td>
                        </tr>
                        <tr>
                           <td>Video Split (seconds, default 0=off):</td>
                           <td><input type="number" size="6" id="video_split" value="0" style="width:6em;">s <input type="button" value="OK" onclick="send_cmd('vi ' + document.getElementById('video_split').value)"></td>
                        </tr>
                        <tr>
                           <td>Annotation (max 127 characters):</td>
                           <td>
                              Text: <input type="text" size="20" id="annotation" value="RPi Cam %Y.%M.%D_%h:%m:%s" style="width:20em;"><input type="button" value="OK" onclick="send_cmd('an ' + encodeURI(document.getElementById('annotation').value))"><input type="button" value="Default" onclick="document.getElementById('annotation').value = 'RPi Cam %Y.%M.%D_%h:%m:%s'; send_cmd('an ' + encodeURI(document.getElementById('annotation').value))"><br>
                              Background: <select onchange="send_cmd('ab ' + this.value)"><option value="0" selected="">Off</option><option value="1">On</option></select>
                           </td>
                        </tr>
                        <tr>
                           <td>Annotation size(0-99):</td>
                           <td>
                              <input type="number" size="3" id="anno_text_size" value="50" style="width:3em;"><input type="button" value="OK" onclick="send_cmd('as ' + document.getElementById('anno_text_size').value)">
                           </td>
                        </tr>
                        <tr>
                           <td>Custom text color:</td>
                           <td><select id="at_en"><option value="0" selected="">Disabled</option><option value="1">Enabled</option></select>
                              y:u:v = <input type="text" size="3" id="at_y" value="255" style="width:3em;">:<input type="text" size="4" id="at_u" value="128" style="width:4em;">:<input type="text" size="4" id="at_v" value="128" style="width:4em;">                              <input type="button" value="OK" onclick="set_at();">
                           </td>
                        </tr>
                        <tr>
                           <td>Custom background color:</td>
                           <td><select id="ac_en"><option value="0" selected="">Disabled</option><option value="1">Enabled</option></select>
                              y:u:v = <input type="text" size="3" id="ac_y" value="0" style="width:3em;">:<input type="text" size="4" id="ac_u" value="128" style="width:4em;">:<input type="text" size="4" id="ac_v" value="128" style="width:4em;">                              <input type="button" value="OK" onclick="set_ac();">
                           </td>
                           </tr>
                        <tr>
                                                </tr><tr>
                           <td>Buffer (1000... ms), default 0:</td>
                           <td><input type="number" size="4" id="video_buffer" value="0" style="width:4em;"><input type="button" value="OK" onclick="send_cmd('bu ' + document.getElementById('video_buffer').value)"></td>
                        </tr>                        <tr>
                           <td>Sharpness (-100...100), default 0:</td>
                           <td><input type="number" size="4" id="sharpness" value="0" style="width:4em;"><input type="button" value="OK" onclick="send_cmd('sh ' + document.getElementById('sharpness').value)"></td>
                        </tr>
                        <tr>
                           <td>Contrast (-100...100), default 0:</td>
                           <td><input type="number" size="4" id="contrast" value="0" style="width:4em;"><input type="button" value="OK" onclick="send_cmd('co ' + document.getElementById('contrast').value)">
                           </td>
                        </tr>
                        <tr>
                           <td>Brightness (0...100), default 50:</td>
                           <td><input type="number" size="4" id="brightness" value="50" style="width:4em;"><input type="button" value="OK" onclick="send_cmd('br ' + document.getElementById('brightness').value)"></td>
                        </tr>
                        <tr>
                           <td>Saturation (-100...100), default 0:</td>
                           <td><input type="number" size="4" id="saturation" value="0" style="width:4em;"><input type="button" value="OK" onclick="send_cmd('sa ' + document.getElementById('saturation').value)"></td>
                        </tr>
                        <tr>
                           <td>ISO (100...800), default 0:</td>
                           <td><input type="number" size="4" id="iso" value="0" style="width:4em;"><input type="button" value="OK" onclick="send_cmd('is ' + document.getElementById('iso').value)"></td>
                        </tr>
                        <tr>
                           <td>Metering Mode, default 'average':</td>
                           <td><select onchange="send_cmd('mm ' + this.value)"><option value="average" selected="">Average</option><option value="spot">Spot</option><option value="backlit">Backlit</option><option value="matrix">Matrix</option></select></td>
                        </tr>
                        <tr>
                           <td>Video Stabilisation, default: 'off'</td>
                           <td><select onchange="send_cmd('vs ' + this.value)"><option value="0" selected="">Off</option><option value="1">On</option></select></td>
                        </tr>
                        <tr>
                           <td>Exposure Compensation (-10...10), default 0:</td>
                           <td><input type="number" size="4" id="exposure_compensation" value="0" style="width:4em;"><input type="button" value="OK" onclick="send_cmd('ec ' + document.getElementById('exposure_compensation').value)"></td>
                        </tr>
                        <tr>
                           <td>Exposure Mode, default 'auto':</td>
                           <td><select onchange="send_cmd('em ' + this.value)"><option value="off">Off</option><option value="auto" selected="">Auto</option><option value="night">Night</option><option value="nightpreview">Nightpreview</option><option value="backlight">Backlight</option><option value="spotlight">Spotlight</option><option value="sports">Sports</option><option value="snow">Snow</option><option value="beach">Beach</option><option value="verylong">Verylong</option><option value="fixedfps">Fixedfps</option></select></td>
                        </tr>
                        <tr>
                           <td>White Balance, default 'auto':</td>
                           <td><select onchange="send_cmd('wb ' + this.value)"><option value="off">Off</option><option value="auto" selected="">Auto</option><option value="sun">Sun</option><option value="cloudy">Cloudy</option><option value="shade">Shade</option><option value="tungsten">Tungsten</option><option value="fluorescent">Fluorescent</option><option value="incandescent">Incandescent</option><option value="flash">Flash</option><option value="horizon">Horizon</option><option value="greyworld">Greyworld</option></select></td>
                        </tr>
                        <tr>
                           <td>White Balance Gains (x100):</td>
                           <td> gain_r <input type="number" size="4" id="ag_r" value="150" style="width:4em;"> gain_b <input type="number" size="4" id="ag_b" value="150" style="width:4em;">                              <input type="button" value="OK" onclick="set_ag();">
                           </td>
                        </tr>
                        <tr>
                           <td>Image Effect, default 'none':</td>
                           <td><select onchange="send_cmd('ie ' + this.value)"><option value="none" selected="">None</option><option value="negative">Negative</option><option value="solarise">Solarise</option><option value="sketch">Sketch</option><option value="denoise">Denoise</option><option value="emboss">Emboss</option><option value="oilpaint">Oilpaint</option><option value="hatch">Hatch</option><option value="gpen">Gpen</option><option value="pastel">Pastel</option><option value="watercolour">Watercolour</option><option value="film">Film</option><option value="blur">Blur</option><option value="saturation">Saturation</option><option value="colourswap">Colourswap</option><option value="washedout">Washedout</option><option value="posterise">Posterise</option><option value="cartoon">Cartoon</option></select></td>
                        </tr>
                        <tr>
                           <td>Colour Effect, default 'disabled':</td>
                           <td><select id="ce_en"><option value="0" selected="">Disabled</option><option value="1">Enabled</option></select>
                              u:v = <input type="text" size="4" id="ce_u" value="128" style="width:4em;">:<input type="text" size="4" id="ce_v" value="128" style="width:4em;">                              <input type="button" value="OK" onclick="set_ce();">
                           </td>
                        </tr>
                        <tr>
                           <td>Image Statistics, default 'Off':</td>
                           <td><select onchange="send_cmd('st ' + this.value)"><option value="0" selected="">Off</option><option value="1">On</option></select></td>
                        </tr>
                        <tr>
                           <td>Rotation, default 0:</td>
                           <td><select onchange="send_cmd('ro ' + this.value)"><option value="0" selected="">No rotate</option><option value="90">Rotate_90</option><option value="180">Rotate_180</option><option value="270">Rotate_270</option></select></td>
                        </tr>
                        <tr>
                           <td>Flip, default 'none':</td>
                           <td><select onchange="send_cmd('fl ' + this.value)"><option value="0">None</option><option value="1">Horizontal</option><option value="2">Vertical</option><option value="3" selected="">Both</option></select></td>
                        </tr>
                        <tr>
                           <td>Sensor Region, default 0/0/65536/65536:</td>
                           <td>
                              x: <input type="number" size="5" id="roi_x" value="0" style="width:5em;"> y: <input type="number" size="5" id="roi_y" value="0" style="width:5em;"><br>
                              w: <input type="number" size="5" id="roi_w" value="65536" style="width:5em;"> h:  <input type="number" size="5" id="roi_h" value="65536" style="width:5em;">                              <input type="button" value="OK" onclick="set_roi();">
                           </td>
                        </tr>
                        <tr>
                           <td>Shutter speed (0...330000), default 0:</td>
                           <td><input type="number" size="4" id="shutter_speed" value="0" style="width:4em;"><input type="button" value="OK" onclick="send_cmd('ss ' + document.getElementById('shutter_speed').value)">
                           </td>
                        </tr>
                        <tr>
                           <td>Image quality (0...100), default 10:</td>
                           <td>
                              <input type="number" size="4" id="image_quality" value="10" style="width:4em;"><input type="button" value="OK" onclick="send_cmd('qu ' + document.getElementById('image_quality').value)">
                           </td>
                        </tr>
                        <tr>
                           <td>Preview quality (1...100), default 10:<br>Width (128...1024), default 512:<br>Divider (1-16), default 1:</td>
                           <td>
                              Quality: <input type="text" size="4" id="quality" value="10" style="width:4em;"><br>
                              Width: <input type="text" size="4" id="width" value="512" style="width:4em;"><br>
                              Divider: <input type="text" size="4" id="divider" value="1" style="width:4em;"><br>
                              <input type="button" value="OK" onclick="set_preview();">
                           </td>
                        </tr>
                        <tr>
                           <td>Raw Layer, default: 'off'</td>
                           <td><select onchange="send_cmd('rl ' + this.value)"><option value="0" selected="">Off</option><option value="1">On</option></select></td>
                        </tr>
                        <tr>
                           <td>Video bitrate (0...25000000), default 17000000:</td>
                           <td>
                              <input type="number" size="10" id="video_bitrate" value="25000000" style="width:10em;"><input type="button" value="OK" onclick="send_cmd('bi ' + document.getElementById('video_bitrate').value)">
                           </td>
                        </tr>
                        <tr>
                           <td>Mininimise frag (0/1), default 0:<br>Init Quantisation, default 25:<br>Encoding qp, default 31:</td>
                           <td>
                              MF: <input type="number" size="4" id="minimise_frag" value="0" style="width:4em;"><br>
                              IQ: <input type="number" size="4" id="initial_quant" value="25" style="width:4em;"><br>
                              QP: <input type="number" size="4" id="encode_qp" value="31" style="width:4em;"><br>
                              <input type="button" value="OK" onclick="set_encoding();">
                           </td>
                        </tr>
                        <tr>
                           <td>MP4 Boxing mode :</td>
                           <td><select onchange="send_cmd('bo ' + this.value)"><option value="0">Off</option><option value="2" selected="">Background</option></select></td>
                        </tr>
                        <tr>
                           <td>Watchdog, default interval 3s, errors 3s:</td>
                           <td>Interval <input type="number" size="3" id="watchdog_interval" value="3" style="width:3em;">s&nbsp;&nbsp;&nbsp;&nbsp;Errors <input type="number" size="3" id="watchdog_errors" value="3" style="width:3em;">                           <input type="button" value="OK" onclick="send_cmd('wd ' + 10 * document.getElementById('watchdog_interval').value + ' ' + document.getElementById('watchdog_errors').value)">
                           </td>
                        </tr>
                        <tr>
                           <td>Motion detect mode:</td>
                           <td><select onchange="send_cmd('mx ' + this.value);setTimeout(function(){location.reload(true);}, 1000);"><option value="0">Internal</option><option value="1" selected="">External</option><option value="2">Monitor</option></select></td>
                        </tr>
                        <tr>
                           <td>Log size lines, default 5000:</td>
                           <td>
                              <input type="number" size="6" id="log_size" value="5000" style="width:6em;"><input type="button" value="OK" onclick="send_cmd('ls ' + document.getElementById('log_size').value)">
                           </td>
                        </tr>
                     </tbody></table>
                  </div>
               </div>
            </div>
            <div class="panel panel-default" style="display:none;">
               <div class="panel-heading">
                  <h2 class="panel-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Motion Settings</a>
                  </h2>
               </div>
               <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                     <table class="settingsTable">
                        <tbody><tr>
                          <td>Motion Vector Preview:</td>
                          <td>
                            <select onchange="send_cmd('vp ' + this.value);setTimeout(function(){location.reload(true);}, 1000);" id="preview_select"><option value="0" selected="">Off</option><option value="1">On</option></select>
                          </td>
                        </tr>
                        <tr>
                           <td>Noise level (1-255 / &gt;1000):</td>
                           <td>
                              <input type="number" size="5" id="motion_noise" value="1010" style="width:5em;"><input type="button" value="OK" onclick="send_cmd('mn ' + document.getElementById('motion_noise').value)">
                           </td>
                        </tr>
                        <tr>
                           <td>Threshold (1-32000):</td>
                           <td>
                              <input type="number" size="5" id="motion_threshold" value="250" style="width:5em;"><input type="button" value="OK" onclick="send_cmd('mt ' + document.getElementById('motion_threshold').value)">
                           </td>
                        </tr>
                        <tr>
                           <td>Clipping factor (2-50), default 3:</td>
                           <td>
                              <input type="number" size="5" id="motion_clip" value="0" style="width:5em;"><input type="button" value="OK" onclick="send_cmd('mc ' + document.getElementById('motion_clip').value)">
                           </td>
                        </tr>
                        <tr>
                           <td>Mask Image:</td>
                           <td>
                              <input type="text" size="30" id="motion_image" value="" style="width:30em;"><input type="button" value="OK" onclick="send_cmd('mi ' + document.getElementById('motion_image').value)">
                           </td>
                        </tr>
                        <tr>
                           <td>Delay Frames to detect:</td>
                           <td>
                              <input type="number" size="5" id="motion_initframes" value="0" style="width:5em;"><input type="button" value="OK" onclick="send_cmd('ms ' + document.getElementById('motion_initframes').value)">
                           </td>
                        </tr>
                        <tr>
                           <td>Change Frames to start:</td>
                           <td>
                              <input type="number" size="5" id="motion_startframes" value="3" style="width:5em;"><input type="button" value="OK" onclick="send_cmd('mb ' + document.getElementById('motion_startframes').value)">
                           </td>
                        </tr>
                        <tr>
                           <td>Still Frames to stop:</td>
                           <td>
                              <input type="number" size="5" id="motion_stopframes" value="150" style="width:5em;"><input type="button" value="OK" onclick="send_cmd('me ' + document.getElementById('motion_stopframes').value)">
                           </td>
                        </tr>
                        <tr>
                           <td>Save vectors to .dat:<br>(Uses more space)</td>
                           <td><select onchange="send_cmd('mf ' + this.value);"><option value="0" selected="">Off</option><option value="1">On</option></select></td>
                        </tr>
                     </tbody></table>
                  </div>
               </div>
            </div>
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h2 class="panel-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">System</a>
                  </h2>
               </div>
               <div id="collapseThree" class="panel-collapse collapse">
                  <div class="panel-body">
                     <input id="toggle_stream" type="button" class="btn btn-primary" value="MJPEG-Stream" onclick="set_stream_mode(this.value);">
                     <input id="allow_simple" type="button" class="btn btn-primary" value="SimpleOn" onclick="set_display(this.value);">
                     <input id="shutdown_button" type="button" value="shutdown system" onclick="sys_shutdown();" class="btn btn-danger">
                     <input id="reboot_button" type="button" value="reboot system" onclick="sys_reboot();" class="btn btn-danger">
                     <input id="reset_button" type="button" value="reset settings" onclick="if(confirm('Are you sure to reset the settings to the default values?')) {send_cmd('rs 1');setTimeout(function(){location.reload(true);}, 1000);}" class="btn btn-danger">
                     <form action="index.php" method="POST">
                        <br>Style
                        <select name="extrastyle" id="extrastyle">
                           <option value="es_Default.css">Default</option><option value="es_Night.css">Night</option>                        </select>
                        &nbsp;<button type="submit" name="OK" value="OK">OK</button>
                     </form>
					 Set Date/Time <input type="text" size="20" id="timestr" value="13 FEB 2018 12:00:00"><input type="button" value="OK" onclick="sys_settime();" <br="">
					 <table class="settingsTable">
						<tbody><tr><td>Macro:error_soft</td><td><input type="text" size="16" id="error_soft" value="error_soft.sh">
<input type="checkbox" checked="" id="error_soft_chk">
<input type="button" value="OK" onclick="send_macroUpdate(0,'error_soft')
;"></td></tr><tr><td>Macro:error_hard</td><td><input type="text" size="16" id="error_hard" value="error_hard.sh">
<input type="checkbox" checked="" id="error_hard_chk">
<input type="button" value="OK" onclick="send_macroUpdate(1,'error_hard')
;"></td></tr><tr><td>Macro:start_img</td><td><input type="text" size="16" id="start_img" value="start_img.sh">
<input type="checkbox" checked="" id="start_img_chk">
<input type="button" value="OK" onclick="send_macroUpdate(2,'start_img')
;"></td></tr><tr><td>Macro:end_img</td><td><input type="text" size="16" id="end_img" value="&amp;end_img.sh">
<input type="checkbox" checked="" id="end_img_chk">
<input type="button" value="OK" onclick="send_macroUpdate(3,'end_img')
;"></td></tr><tr><td>Macro:start_vid</td><td><input type="text" size="16" id="start_vid" value="&amp;start_vid.sh">
<input type="checkbox" checked="" id="start_vid_chk">
<input type="button" value="OK" onclick="send_macroUpdate(4,'start_vid')
;"></td></tr><tr><td>Macro:end_vid</td><td><input type="text" size="16" id="end_vid" value="end_vid.sh">
<input type="checkbox" checked="" id="end_vid_chk">
<input type="button" value="OK" onclick="send_macroUpdate(5,'end_vid')
;"></td></tr><tr><td>Macro:end_box</td><td><input type="text" size="16" id="end_box" value="&amp;end_box.sh">
<input type="checkbox" checked="" id="end_box_chk">
<input type="button" value="OK" onclick="send_macroUpdate(6,'end_box')
;"></td></tr><tr><td>Macro:do_cmd</td><td><input type="text" size="16" id="do_cmd" value="&amp;do_cmd.sh">
<input type="checkbox" checked="" id="do_cmd_chk">
<input type="button" value="OK" onclick="send_macroUpdate(7,'do_cmd')
;"></td></tr><tr><td>Macro:motion_event</td><td><input type="text" size="16" id="motion_event" value="motion_event.sh">
<input type="checkbox" checked="" id="motion_event_chk">
<input type="button" value="OK" onclick="send_macroUpdate(8,'motion_event')
;"></td></tr><tr><td>Macro:startstop</td><td><input type="text" size="16" id="startstop" value="startstop.sh">
<input type="checkbox" checked="" id="startstop_chk">
<input type="button" value="OK" onclick="send_macroUpdate(9,'startstop')
;"></td></tr>					 </tbody></table>
                  </div>
               </div>
            </div>
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h2 class="panel-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Help</a>
                  </h2>
               </div>
               <div id="collapseFour" class="panel-collapse collapse">
                  <div class="panel-body">
                    Github: <a href="https://github.com/silvanmelchior/RPi_Cam_Web_Interface" target="_blank">https://github.com/silvanmelchior/RPi_Cam_Web_Interface</a><br>
                    Forum: <a href="http://www.raspberrypi.org/forums/viewtopic.php?f=43&amp;t=63276" target="_blank">http://www.raspberrypi.org/forums/viewtopic.php?f=43&amp;t=63276</a><br>
                    Wiki: <a href="http://elinux.org/RPi-Cam-Web-Interface" target="_blank">http://elinux.org/RPi-Cam-Web-Interface</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
         

</body></html>