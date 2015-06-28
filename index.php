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

                </div> <!-- close peep -->



            <?php } //close peep loop ?>

        </div>

        <div id="links" class="row">
            <h4>Useful Links</h4>
            <ul>
                <li><a href="https://www.google.com/maps/d/u/0/edit?mid=zV5awlFb4iAI.kfiA5LOoArGQ">Exploring Oz (map)</a></li>
                <li><a href="https://drive.google.com/drive/u/0/folders/0B2Ky0cf5wQuhfndSUmkySGVtR1RlV1UwTVVXOW8tcG5vMlppYi1BLXB2ZHhSZlBIbkJFX28">Oz Pictures (google drive)</a></li>
            </ul>
        </div>


    </div>

    <!-- Boostrap -->
    <script src="inc/bootstrap/js/bootstrap.min.js"></script>

    <!-- fire both people -->
    <script type="text/javascript">
        $(document).ready(function(){
            showPerson('chirps');
            showPerson('zippy');    
        });        
    </script>
    
</body>

</html>
