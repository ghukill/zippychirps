<!DOCTYPE php>

<?php include ("config.php"); ?>

<html>

<head>
    <meta charset="utf-8">
    <title>ZippyChirps</title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- analog clock -->
    <!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
    <script type="text/javascript" src="js/coolclock.js"></script>
    <script type="text/javascript" src="js/moreskins.js"></script>

    <!--jquery-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>

    <!--Mustache-->
    <script src="inc/mustache/jquery.mustache.js"></script>
    <script type="text/javascript" src="inc/mustache/mustache.js"></script>

    <!-- Bootstrap -->
	<link href="inc/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- local css -->
	<link rel="stylesheet" href="css/stylesheet.css" type="text/css">        
    
    <!--Pagination-->
    <!--<script type="text/javascript" src="inc/jquery.bootpag.min.js"></script>-->       
    
    <!--jscookie-->
    <script src="inc/jquery_cookie/jquery.cookie.js" type="text/javascript"></script>

    <!-- timezone -->
    <script src="http://momentjs.com/downloads/moment.js"></script>
    <script src="http://momentjs.com/downloads/moment-timezone-with-data-2010-2020.js"></script>

    <!-- video-js -->
    <!--<link href="inc/video-js/video-js.css" rel="stylesheet"/>-->

    

    <!-- bump PHP array to JS -->
    <script type="text/javascript">
        var peeps = <?php echo json_encode($peeps) ?>;
    </script>

    <!-- Local JS -->
    <script src="js/main.js" type="text/javascript"></script>

</head>

<body>
	
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h3>ZippyChirps</h3>
            </div>
            <div class="col-md-12" style="text-align:center;">

                <div id="countdown">
                    <p class="">T-Minus...</p>
                    <p class="countdown_text days">00</p>
                    <p class="timeRefDays">days</p>
                    <p class="countdown_text hours">00</p>
                    <p class="timeRefHours">hours</p>
                    <p class="countdown_text minutes">00</p>
                    <p class="timeRefMinutes">minutes</p>
                    <p class="countdown_text seconds">00</p>
                    <p class="timeRefSeconds">seconds</p>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
        </div>

        <div class="row">

            <?php foreach($peeps as $peep => $peep_array){ ?>

                <!-- Peep -->
                <div id="<?php echo $peep; ?>" class="peep col-md-6">
                    
                    <!-- image -->
                    <div class="col-md-12 peep_image">
                        <img src="http://68.42.117.7:4567/get?key=<?php echo $peep; ?>_img&mime=image/jpeg" class="img-circle">
                    </div>

                    <!-- analog clock -->
                    <div id="<?php echo $peep; ?>_clock" class="col-md-12"></div>                    

                    <!-- time -->
                    <div class="col-md-12">
                        <h3><span class="timeString"></span></h3>
                        <!-- <p><span class="timezoneString"></span></p> -->
                    </div>

                    <!-- weather -->
                    <div class="row">
                        <div class="col-md-12">
                            <iframe id="forecast_embed" type="text/html" frameborder="0" height=200 src="http://forecast.io/embed/#lat=<?php echo $peep_array['latitude']; ?>&lon=<?php echo $peep_array['longitude']; ?>"> </iframe>
                        </div>
                    </div>

                    <!-- media -->
                    <div class="row">
                        <div class="col-md-12">
                            <h3 onclick="$('#<?php echo $peep; ?>_media').fadeToggle();">Media Delights (click to toggle)</h3>
                            <div id="<?php echo $peep; ?>_media" style="display:none;">
                            <?php 
                                foreach($peep_array['media'] as $media){
                                    echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/'.$media.'?rel=0" frameborder="0" allowfullscreen></iframe>';
                                }
                            ?>   
                            </div>                       
                        </div>
                    </div>


                </div> <!-- close peep -->



            <?php } //close peep loop ?>

        </div>

        <div id="links" class="row">
            <h4>Useful Links</h4>
            <ul>
                <li><a href="https://www.google.com/maps/d/u/0/edit?mid=zV5awlFb4iAI.kfiA5LOoArGQ">Exploring Oz (map)</a></li>
                <li><a href="https://drive.google.com/drive/u/0/folders/0B2Ky0cf5wQuhfndSUmkySGVtR1RlV1UwTVVXOW8tcG5vMlppYi1BLXB2ZHhSZlBIbkJFX28">Oz Pictures (google drive)</a></li>
		<li><a href="http://padlet.com/ghukill/tgw4tprs7s0v">PacPadLet</a></li>
            </ul>
        </div>


    </div>

    <!-- Boostrap -->
    <script src="inc/bootstrap/js/bootstrap.min.js"></script>

    <!-- video.js -->    
    <!--<script type="text/javascript" src="inc/video-js/video.js"></script>
    <script>
        videojs.options.flash.swf = "inc/video-js/video-js.swf"
    </script>-->

    <!-- fire both people -->
    <script type="text/javascript">
        $(document).ready(function(){
            showPerson('chirps');
            showPerson('zippy');    
        });        
    </script>

    <script type="text/javascript">
        /*
        * Basic Count Down to Date and Time
        * Author: @mrwigster / trulycode.com
        */
        (function (e) {
          e.fn.countdown = function (t, n) {
          function i() {
            eventDate = Date.parse(r.date) / 1e3;
            currentDate = Math.floor(e.now() / 1e3);
            if (eventDate == currentDate) {
              window.location = "./celebration.php"
              // n.call(this);
              // clearInterval(interval)
            }
            else if (eventDate < currentDate) {
              window.location = "./celebration.php"
              // n.call(this);
              // clearInterval(interval)
            }
            else if (eventDate <= currentDate) {
              n.call(this);
              clearInterval(interval)
            }
            
            // else if (eventDate == currentDate){
            //     alert('whoo!');
            // }
            // else {
            //     console.log('all done!');
            //     window.location = "http://www.google.com/"
            //     return;
            // }
            seconds = eventDate - currentDate;
            days = Math.floor(seconds / 86400);
            seconds -= days * 60 * 60 * 24;
            hours = Math.floor(seconds / 3600);
            seconds -= hours * 60 * 60;
            minutes = Math.floor(seconds / 60);
            seconds -= minutes * 60;
            days == 1 ? thisEl.find(".timeRefDays").text("day") : thisEl.find(".timeRefDays").text("days");
            hours == 1 ? thisEl.find(".timeRefHours").text("hour") : thisEl.find(".timeRefHours").text("hours");
            minutes == 1 ? thisEl.find(".timeRefMinutes").text("minute") : thisEl.find(".timeRefMinutes").text("minutes");
            seconds == 1 ? thisEl.find(".timeRefSeconds").text("second") : thisEl.find(".timeRefSeconds").text("seconds");
            if (r["format"] == "on") {
              days = String(days).length >= 2 ? days : "0" + days;
              hours = String(hours).length >= 2 ? hours : "0" + hours;
              minutes = String(minutes).length >= 2 ? minutes : "0" + minutes;
              seconds = String(seconds).length >= 2 ? seconds : "0" + seconds
            }
            if (!isNaN(eventDate)) {
              thisEl.find(".days").text(days);
              thisEl.find(".hours").text(hours);
              thisEl.find(".minutes").text(minutes);
              thisEl.find(".seconds").text(seconds)
            } else {
              alert("Invalid date. Example: 30 Tuesday 2013 15:50:00");
              clearInterval(interval)
            }
          }
          var thisEl = e(this);
          var r = {
            date: null,
            format: null
          };
          t && e.extend(r, t);
          i();
          interval = setInterval(i, 1e3)
          }
          })(jQuery);
          $(document).ready(function () {
          function e() {
            var e = new Date;
            e.setDate(e.getDate() + 60);
            dd = e.getDate();
            mm = e.getMonth() + 1;
            y = e.getFullYear();
            futureFormattedDate = mm + "/" + dd + "/" + y;
            return futureFormattedDate
          }
          $("#countdown").countdown({
            date: "8 August 2015 20:09:00", // Change this to your desired date to countdown to
            // date: "6 August 2015 22:00:00", // DEBUG
            format: "on"
          });
        });
    </script>
    
</body>

</html>
