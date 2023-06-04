<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
    <title>Hotel Villa</title>

    <link rel="stylesheet" href="assets/css/layerslider.css"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="assets/css/flexslider.css"/>
    <link rel="stylesheet" href="assets/css/responsive.css"/>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="assets/css/prettyPhoto.css"/>
    <link rel="stylesheet" href="assets/css/woocommerce-modify.css"/>
    <link rel="stylesheet" href="assets/css/skins/brown.css"/>

    <!-- Browser Specical File-->
    <!--[if IE 8]><link href="../assets/css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
    
    <!-- JavaScript -->
    <script src="assets/js/jquery-1.9.1.min.js"></script>
    <script src="assets/js/jquery.modernizr.js"></script>
    
    <?php
        require_once "hotelhelper.php";
        $helper = new HotelHelper();
        
        $id = $_REQUEST['id'];
        if(!$id)
        {
            header("rooms.php");
        }
        
        $data = $helper->getRoomDetail($id);
        $category_array = array('1'=>'A/C ROOM', '2'=>'Non-A/C ROOM', '3'=>'STANDARD ROOM');
    ?>

</head>
<body>

<div class="body-outer-wrapper">
    <div id="body-wrapper" class="body-wrapper full-width-mode">
        
        <?php require_once "header.php"; ?>
        
        <div class="titlebar-outer-wrapper" style="background:url('assets/images/titlebar-bg.jpg') no-repeat top center;">
            <div class="shadow-box"></div>
        </div>

        <div class="main-outer-wrapper has-titlebar">
            <div class="main-wrapper container">
                <div class="row row-wrapper">
                    <div class="page-outer-wrapper">
                        <div class="page-wrapper twelve columns no-sidebar b0">
                            
                            <div class="row">
                                <div class="twelve columns b0">
                                    <div class="page-title-wrapper">
                                        <h1 class="page-title left"><?php echo $data->title;?></h1>
                                        <div class="page-title-alt right">
                                            <a href="reservation.php?room_id=<?php echo $id;?>" class="btn book_this_room">Book this room</a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="content-wrapper eight columns">
                                    <div class="cpt-thumb-wrapper">
                                        <div class="flexslider">
                                            <ul class="slides">
                                                <li>
                                                    <a rel="prettyPhoto" title="<?php echo $data->title;?> Gallery" href="admin/roomimages/<?php echo $data->image; ?>">
                                                        <img src="admin/roomimages/<?php echo $data->image; ?>" alt=""/>
                                                    </a>
                                                </li> 
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="text-content">
                                        <div class="services-included">
                                        <li><span class=" 3 room-available">3 Room Available</span></li>
                                            <h3>Services Included</h3>
                                            <ul>
                                                <li><span class="room-service">Room Service</span></li>
                                                <li><span class="room-safe">Built-in Safe</span></li>
                                                <li><span class="room-wifi">Free WiFi</span></li>
                                                <li><span class="room-parking">Parking</span></li>
                                                <li><span class="room-pets">Pets Allowed</span></li>
                                                <li><span class="room-television">Television (27")</span></li>
                                                <li><span class="room-service">Room Service</span></li>
                                                <li><span class="room-safe">Built-in Safe</span></li>
                                            </ul>
                                        </div>
                                        <p><?php echo $data->description;?></p>
                                        <a href="reservation.php?room_id=<?php echo $id;?>" class="btn book_this_room">Book this room</a>
                                    </div>

                                </div>
                                 
                                
                                <div class="clear"></div>
                            </div> <!-- END .row -->

                        </div> <!-- END .page-wrapper -->
                        <div class="clear"></div>

                    </div> <!-- END .page-outer-wrapper -->
                </div>
            </div> <!-- END .main-wrapper -->

        </div> <!-- END .main-outer-wrapper -->

         <?php require_once "footer.php"; ?>


    </div><!-- END .body-wrapper -->
</div><!-- END .body-outer-wrapper -->
	

    <!-- Javascript -->
    <?php /* ?>
    <script src="assets/js/ddsmoothmenu.js"></script>
    <script src="assets/js/purl.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/jquery.fitvids.js"></script>
    <script src="assets/js/jquery.imagesloaded.min.js"></script>
    <script src="assets/js/jquery.isotope.min.js"></script>

    
    
    <script src="assets/js/jquery-ui.datepicker.js"></script>
    <script src="assets/js/shortcodes.js"></script>
    <script src="js/custom.js"></script>
    <?php */ ?>
    
    <script src="assets/js/ddsmoothmenu.js"></script>
    <script src="assets/js/purl.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/jquery.fitvids.js"></script>
    <script src="assets/js/jquery.imagesloaded.min.js"></script>
    <script src="assets/js/jquery.isotope.min.js"></script>

    <!-- Included LayerSlider -->
    <script src="assets/js/jquery-easing-1.3.js"></script>
    <script src="assets/js/jquery-transit-modified.js"></script>
    <script src="assets/js/layerslider.transitions.js"></script>
    <script src="assets/js/layerslider.kreaturamedia.jquery.js"></script>
    
    <script type='text/javascript'>
    /* <![CDATA[ */
    var FS = {"animation":"slide","pauseOnHover":"true","controlNav":"true","directionNav":"false","animationDuration":"500","slideshowSpeed":"5000","pauseOnAction":"false"};
    /* ]]> */
    </script>

    <script src="assets/js/jquery.flexslider.js"></script>
    <script src="assets/js/jquery-ui.datepicker.js"></script>
    <script src="assets/js/shortcodes.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/jquery.datetimepicker.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function (){
        jQuery('.datetimepicker').datetimepicker({
            /*format:'d/m/Y H:i',
        	formatDate:'Y/m/d H:i',*/
        	minDate:'+1970/01/02'
        });
    });
    </script>

</body>
</html>