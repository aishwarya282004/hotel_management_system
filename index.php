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
    
    <link rel="stylesheet" href="assets/css/flexslider/flexslider.css" media="screen" />
	

    <!-- Browser Specical File-->
    <!--[if IE 8]><link href="assets/css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
    
    <!-- JavaScript -->
    <script src="assets/js/jquery-1.9.1.min.js"></script>
    <script src="assets/js/jquery.modernizr.js"></script>
    <?php
    require_once "hotelhelper.php";
    
    $msg = '';
    
    $helper = new HotelHelper();
    ?>

</head>
<body>

<div class="body-outer-wrapper">
    <div id="body-wrapper" class="body-wrapper full-width-mode">
        
        <?php require_once "header.php"; ?>

        <div class="slider-outer-wrapper">
            <div class="main_slider">
                <div id="layerslider" style="width: 100%; height: 500px; margin: 0px auto; ">

                    <div class="ls-layer" style="slidedirection: top; slidedelay: 7000; durationin: 1500; durationout: 1500; delayout: 500;">
                        <img src="assets/images/hotel-1.jpg" class="ls-bg" alt="">
                        

                    </div>

                    <div class="ls-layer" style="slidedelay: 6000;">

                        <img src="assets/images/slider3.jpg" class="ls-bg" alt="">
                        

                    </div>

                </div>
            </div>
            
            <div class="shadow-box"></div>
        </div>

        <div class="main-outer-wrapper has-slider">
            <div class="main-wrapper container">
                <div class="row row-wrapper">
                    <div class="page-outer-wrapper">
                        <div class="page-wrapper twelve columns no-sidebar b0">
                            
                            <div class="row">
                                <div class="twelve columns">
                                    <div class="builder-item-wrapper builder-editor">
                                        <div class="builder-title-wrapper clearfix">
                                            <h3 class="builder-item-title">Welcome to Hotel Villa</h3>
                                        </div>
                                        <div class="builder-item-content row">
                                            <div class="twelve columns b0">
                                                <img class="hotel-thumb" src="assets/images/HLeft_Img.jpg" alt="">
                                                <p>Laculis diam eu tortor euismodolo. Vestib ulum antipsum primis inicibu orci luctus edloret ultrices et posuere cubil sed odiocinialor it matis ed.</p>

                                                <p>Eu tortor euismodolo. Vestibulum ant psu meop primis inicibu orci luctus ed ultrices et posuere cubil. Cura sed quis nibhut odiocinialor matis ed iaculis ante sed vel laciniate. Eu tortor euismodolo. Vestibulum ant psu meop primis inicibu orci luctus ed ultrices et posuere cubil. Cura sed quis nibhut odiocinialor matis ed iaculis ante sed vel laciniate.</p>
                                                
                                                <p>Laculis diam eu tortor euismodolo. Vestib ulum antipsum primis inicibu orci luctus edloret ultrices et posuere cubil sed odiocinialor it matis ed.</p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="clear"></div>
                            </div> <!-- END .row -->


                            <div class="row">
                                <div class="twelve columns b0">
                                    <div class="builder-item-wrapper builder-rooms">
                                        
                                        <div class="builder-title-wrapper clearfix">
                                            <h3 class="builder-item-title">Highlight Rooms</h3>
                                            <a href="#" class="view-all">View All Rooms →</a>
                                        </div>

                                        <div class="builder-item-content row">
                                            <div class="twelve columns b0">
                                                <div class="cpt-items row clearfix isotope">
                                                
                                                    <?php
                                                        $helper->getLatestRooms();
                                                     ?>
                                                    <?php /*
                                                    <div class="cpt-item four columns isotope-item rooms">
                                                        <div class="thumb-wrapper">
                                                        
                                                            <div class="thumb-control-wrapper">
                                                                <ul class="thumb-control clearfix">
                                                                    <!---
                                                                    <li><a title="View Detail" href="#" class="go-detail">Open Detail</a></li>
                                                                    <li><a rel="prettyPhoto[gallery1]" title="Room 1 Gallery 1" href="assets/images/room_1.jpg" class="go-gallery">Open Gallery</a></li>
                                                                    -->
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="cpt-detail">
                                                    <ul>
                                                            
                                                    </ul>
                                                        </div>
                                                    </div>

                                                    <div class="cpt-item four columns isotope-item suites">
                                                        <div class="thumb-wrapper">
                                                            <img src="assets/images/suite_1.jpg" alt="">
                                                            <div class="thumb-control-wrapper">
                                                                <ul class="thumb-control clearfix">
                                                                    <li><a title="View Detail" href="#" class="go-detail">Open Detail</a></li>
                                                                    <li><a rel="prettyPhoto" title="Room 3 Gallery" href="assets/images/suite_1.jpg" class="go-gallery">Open Gallery</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="cpt-detail">
                                                            <h2 class="cpt-title"><a href="#">SUP. A/C DELUXE ROOM</a></h2>
                                                            <div class="cpt-desc">from Rs. 3000 per night <a href="reservation.php">Book Now</a></div>
                                                        </div>
                                                    </div>

                                                    <div class="cpt-item four columns isotope-item rooms">
                                                        <div class="thumb-wrapper">
                                                            <img src="assets/images/room_3.jpg" alt="">
                                                            <div class="thumb-control-wrapper">
                                                                <ul class="thumb-control clearfix">
                                                                    <li><a title="View Detail" href="#" class="go-detail">Open Detail</a></li>
                                                                    <li><a rel="prettyPhoto" title="Room 3 Gallery" href="assets/images/room_3.jpg" class="go-gallery">Open Gallery</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="cpt-detail">
                                                            <h2 class="cpt-title"><a href="#">DELUXE A/C ROOM</a></h2>
                                                            <div class="cpt-desc">from Rs.2500 per night <a href="reservation.php">Book Now</a></div>
                                                        </div>
                                                    </div>
                                                    */ ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
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

    <script src="assets/js/flexslider/jquery.flexslider.js"></script>
    
    <script src="assets/js/jquery.flexslider.js"></script>
    <script src="assets/js/jquery-ui.datepicker.js"></script>
    <script src="assets/js/shortcodes.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>