<!DOCTYPE php>

<?php include ("config.php"); ?>

<html>

<head>
    <meta charset="utf-8">
    <title>ZippyChirps</title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
            <h3>ZippyChirps</h3>
            <hr>
        </div>

        <div class="row">

            <?php foreach($peeps as $peep => $peep_array){?>

                <!-- Peep -->
                <div id="<?php echo $peep; ?>" class="col-md-6">
                    
                    <!-- image -->
                    <div id="image_row" class="row">
                        <div class="col-md-12">
                            <img width=75 src="http://68.42.117.7:4567/get?key=<?php echo $peep; ?>_img&mime=image/jpeg" alt="..." class="img-circle">
                        </div>
                    </div>

                    <!-- Clock -->
                    <!-- <h2>ANALOG CLOCK</h2> -->

                    <!-- Location -->

                    <!-- location -->
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>Location:</strong> <span class="latitude"></span> / <span class="longitude"></span></p>
                        </div>
                    </div>

                    <!-- time -->
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>Current Time:</strong> <span class="timezoneString"></span></p>
                            <p><strong>Current Time:</strong> <span class="timeString"></span></p>
                        </div>
                    </div>

                    <!-- weather -->
                    <iframe id="forecast_embed" type="text/html" frameborder="0" height="245" width="100%" src="http://forecast.io/embed/#lat=<?php echo $peep_array['latitude']; ?>&lon=<?php echo $peep_array['longitude']; ?>"> </iframe>                    

                </div> <!-- close peep -->

            <?php } //close peep loop ?>

        </div>

    </div>

    <!-- Boostrap -->
    <script src="inc/bootstrap/js/bootstrap.min.js"></script>

    <!-- fire both people -->
    <script type="text/javascript">
        showPerson('chirps');
        showPerson('zippy');
    </script>
    
</body>

</html>
