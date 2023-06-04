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
    <link rel="stylesheet" href="custom.css"/>
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.css"/>

    <!-- Browser Specical File-->
    <!--[if IE 8]><link href="assets/css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
    
    <!-- JavaScript -->
    <script src="assets/js/jquery-1.9.1.min.js"></script>
    <script src="assets/js/jquery.modernizr.js"></script>
    
    <?php
    require_once "hotelhelper.php";
    
    $msg = '';
    
    $helper = new HotelHelper();
    if($_POST)
    {
        $return = $helper->booknow();
        
        if($return == 1)
        {
            $msg = '<p class="notice notice_ok">Thank you for reservation. We will get back to you as soon as possible.</p>';
        }
        else if($return == -1)
        {
            $msg = '<p class="notice notice_error">Sorry Rooms Already Reserved.</p>';
        }
    }
    ?>
    
    <script type="text/javascript">
    function validate_form()
    {
        var arrival_date    = document.getElementById("arrival_date").value;
        var departure_date  = document.getElementById("departure_date").value;
        var room_id         = document.getElementById("room_id").value;
        var rooms           = document.getElementById("rooms").value;
        var name            = document.getElementById("name").value;
        var address         = document.getElementById("address").value;
        var email           = document.getElementById("email").value;
        var phone           = document.getElementById("phone").value;
        
        if(arrival_date=='')
        {
            alert("Please Select Arrival Date.");
            return false;
        }
        else if(departure_date=='')
        {
            alert("Please Select Departure Date.");
            return false;
        }
        else if(Date.parse( new Date(departure_date)) < Date.parse( new Date(arrival_date))){
            alert("Please Select Departure Date Greater Than Arrival Date.");
            return false;   
        }
        else if(getCalDays()==0)
        {
            alert("Please Select Valid Days.");
            return false;
        }
        else if(room_id=='')
        {
            alert("Please Select Room.");
            return false;
        }
        else if(rooms=='')
        {
            alert("Please Select No. of Rooms.");
            return false;
        }
        else if(calculateBill()==0)
        {
            alert("Something goes wrong.");
            return false;
        }
        else if(name=='')
        {
            alert("Please Enter Name.");
            return false;
            
        }
        else if(!isNaN(name))
        {
            alert("Name should not be numbric...");
            return false;
            
        }
        else if(address=='')
        {
            alert("Please Enter address.");
            return false;
            
        }
        else if(email=='')
        {
            alert("Please Enter Email Address.");
            return false;
            
        }
        else if(validateEmail(email))
        {
            alert("Please Enter Valid Email Address.");
            return false;
            
        }
        else if(phone=='')
        {
            alert("Please Enter Phone Number.");
            return false;  
        }
        else if(isNaN(phone))
        {
            alert("Phone Number should be numeric.");
            return false;  
        }
        else if(checkInternationalPhone(phone)==false)
        {
            alert("Please Enter a Valid Phone Number");
    		return false;
            
        }
    }
    
    function getCalDays()
    {
        var arrival_date    = document.getElementById("arrival_date").value;
        var departure_date  = document.getElementById("departure_date").value;
        
        var oneDay          = 24*60*60*1000; // hours*minutes*seconds*milliseconds
        var firstDate       = new Date(arrival_date);
        var secondDate      = new Date(departure_date);
        
        var diffDays        = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
        
        document.getElementById("no_of_days").value = (diffDays+1);
        
        return (diffDays+1);
    }
    
    function calculateBill()
    {
        var arrival_date    = document.getElementById("arrival_date").value;
        var departure_date  = document.getElementById("departure_date").value;
        var room_id         = document.getElementById("room_id").value;
        var rooms           = document.getElementById("rooms").value;
        
        if(arrival_date=='')
        {
            alert("Please Select Arrival Date.");
            return false;
        }
        else if(departure_date=='')
        {
            alert("Please Select Departure Date.");
            return false;
        }
        else if(Date.parse( new Date(departure_date)) < Date.parse( new Date(arrival_date))){
            alert("Please Select Departure Date Greater Than Arrival Date.");
            return false;   
        }
        else if(room_id=='')
        {
            alert("Please Select Room.");
            return false;
        }
        else if(rooms=='')
        {
            alert("Please Select No. of Rooms.");
            return false;
        }
        else
        {
            getCalDays();
                
            jQuery("#bill_info").show();
            
            var no_of_days  = document.getElementById("no_of_days").value;
            var rooms       = document.getElementById("rooms").value;
            var room_id     = jQuery("#room_id option:selected").text();//document.getElementById("room_id").value;
            var arr         = [];
            arr             = room_id.split('-');
            var price       = arr[1];
            
            
            
            var total_bill  = no_of_days*rooms*price;
            document.getElementById("total_bill").value = (total_bill);
            
            jQuery("#reservation_submit").show();
        
        }
        return 1;
    }
    
    function validateEmail(email)
    {
        var atpos  = email.indexOf("@");   // The indexOf() method returns the position of the first occurrence of a specified value in a string. // Default value of start is 0  
        //alert(atpos);
        var dotpos = email.lastIndexOf(".");  // The lastIndexOf() method returns the position of the last occurrence of a specified value in a string. // Default value of start is 0  
        //alert(dotpos);
        
        if((atpos<1) || (dotpos<(atpos+2)) || (dotpos+2>=email.length))  
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    // Declaring required variables
    var digits = "0123456789";
    // non-digit characters which are allowed in phone numbers
    var phoneNumberDelimiters = "()- ";
    // characters which are allowed in international phone numbers
    // (a leading + is OK)
    var validWorldPhoneChars = phoneNumberDelimiters + "+";
    // Minimum no of digits in an international phone no.
    var minDigitsInIPhoneNumber = 10;
    
    function isInteger(s)
    {   var i;
        for (i = 0; i < s.length; i++)
        {   
            // Check that current character is number.
            var c = s.charAt(i);
            if (((c < "0") || (c > "9"))) return false;
        }
        // All characters are numbers.
        return true;
    }
    
    function trim(s)
    {   var i;
        var returnString = "";
        // Search through string's characters one by one.
        // If character is not a whitespace, append to returnString.
        for (i = 0; i < s.length; i++)
        {   
            // Check that current character isn't whitespace.
            var c = s.charAt(i);
            if (c != " ") returnString += c;
        }
        return returnString;
    }
    
    function stripCharsInBag(s, bag)
    {   var i;
        var returnString = "";
        // Search through string's characters one by one.
        // If character is not in bag, append to returnString.
        for (i = 0; i < s.length; i++)
        {   
            // Check that current character isn't whitespace.
            var c = s.charAt(i);
            if (bag.indexOf(c) == -1) returnString += c;
        }
        return returnString;
    }
    
    function checkInternationalPhone(strPhone){
        var bracket=3;
        strPhone=trim(strPhone);
        if(strPhone.indexOf("+")>1) return false;
        if(strPhone.indexOf("-")!=-1)bracket=bracket+1;
        if(strPhone.indexOf("(")!=-1 && strPhone.indexOf("(")>bracket)return false;
        var brchr=strPhone.indexOf("(");
        if(strPhone.indexOf("(")!=-1 && strPhone.charAt(brchr+2)!=")")return false;
        if(strPhone.indexOf("(")==-1 && strPhone.indexOf(")")!=-1)return false;
        s=stripCharsInBag(strPhone,validWorldPhoneChars);
        return (isInteger(s) && s.length >= minDigitsInIPhoneNumber);
    }
    
    </script>
    
    


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
                                        <h1 class="page-title left">SEND REQUEST FOR ROOM RESERVATION</h1>
                                        <div class="page-title-alt right">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="content-wrapper eight columns">
                                    
                                    <div class="text-content">
                                        
                                        
                                    <form id="reservation_form" class="reservation_form reservation_form_page" action="" method="post" onsubmit="return validate_form();">
                                        <div class="form-row notice_bar">
                                            <?php
                                            if($msg !='')
                                            {
                                                echo $msg;
                                            }
                                            
                                            ?>
                                        </div>

                                        <div class="row">
                                            <div class="six columns b0">
                                                <div class="form-row field_text">
                                                    <label>Arrival Date:</label><br/>
                                                    <input id="arrival_date" class="input_text datetimepicker required" type="text" value="" name="arrival_date"/>
                                                </div>
                                                <div class="form-row field_select">
                                                    <label>Choose Room:</label><br/>
                                                    <div class="select-box">
                                                        <span>Select a room</span>
                                                        <select class="" name="room_id" id="room_id">
                                                            <option value="">Select Room</option>
                                                            <?php
                                                            $helper->getRoomsOptions();
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row field_select">
                                                    <label>No. of adults:</label><br>
                                                    <div class="select-box">
                                                        <span>1</span>
                                                        <select class="" name="adults" id="adults">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row field_text">
                                                    <label>Your Name:</label><br/>
                                                    <input id="name" class="input_text required" type="text" value="" name ="name"/>
                                                </div>
                                                <div class="form-row field_text">
                                                    <label>Your email address:</label><br/>
                                                    <input id="email" class="input_text required" type="text" value="" name ="email"/>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="six columns b0">
                                                <div class="form-row field_text">
                                                    <label>Departure Date:</label><br/>
                                                    <input id="departure_date" class="input_text datetimepicker required" type="text" value="" name="departure_date"/>
                                                </div>
                                                <div class="form-row field_select">
                                                    <label>No. of rooms:</label><br/>
                                                    <div class="select-box">
                                                        <span>1</span>
                                                        <select class="" name="rooms" id="rooms">
                                                            <option value="">Select Rooms</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="3">4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row field_select">
                                                    <label>No. of Kids:</label><br/>
                                                    <div class="select-box">
                                                        <span>0</span>
                                                        <select class="" name="kids" id="kids">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="3">4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row field_text">
                                                    <label>Your Address:</label><br/>
                                                    <input id="address" class="input_text" type="text" value="" name ="address"/>
                                                </div>
                                                <div class="form-row field_text">
                                                    <label>Your phone number:</label><br/>
                                                    <input id="phone" class="input_text required" type="text" value="" maxlength="10" name ="phone"/>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form-row field_textarea">
                                            <label>Special Requirements: </label>
                                            <textarea id="special_req" class="" name="special_req"></textarea>
                                        </div>
                                        <div class="form-row field_submit mt20">
                                            <input type="button" value="Calculate Bill" id="calculate_bill" class="btn" onclick="calculateBill();"/>
                                        </div>
                                        <div id="bill_info" style="display: none;">
                                            <div class="form-row field_text">
                                                <label>No of Days:</label><br/>
                                                <input id="no_of_days" class="input_text" type="text" value="" name ="no_of_days" readonly=""/>
                                            </div>
                                            <div class="form-row field_text">
                                                <label>Total Bill:</label><br/>
                                                <input id="total_bill" class="input_text required" type="text" value="" name ="total_bill" readonly=""/>
                                            </div>
                                        </div>
                                        <div class="form-row field_submit mt20">
                                            <input style="display: none;" type="submit" value="Book Now" id="reservation_submit" class="btn">
                                            <span class="loading hide"><img src="assets/images/loader.gif"></span>
                                        </div>
                                        <div class="form-row notice_bar">
                                            <p class="notice notice_ok hide">Thank you for contacting us. We will get back to you as soon as possible.</p>
                                            <p class="notice notice_error hide">Due to an unknown error, your form was not submitted. Please resubmit it or try later.</p>
                                        </div>
                                    </form> <!-- END Reservation Form -->


                                    </div> <!-- END .text-content -->
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