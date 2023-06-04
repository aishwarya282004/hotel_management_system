<?php

error_reporting(0);
session_start();

require_once "inc/config.php";
require_once "inc/dbhelper.php";

class HotelHelper
{
    function booknow()
    {
        $db     = new Database();
        $db->open();
        
        $name           = $_POST['name'];
        $address        = $_POST['address'];
        $email          = $_POST['email'];
        $phone          = $_POST['phone'];
        $room_id        = $_POST['room_id'];
        $rooms          = $_POST['rooms'];
        $adults         = $_POST['adults'];
        $kids           = $_POST['kids'];
        $arrival_date   = $_POST['arrival_date'];
        $departure_date = $_POST['departure_date'];
        $special_req    = $_POST['special_req'];
        $no_of_days     = $_POST['no_of_days'];
        $total_bill     = $_POST['total_bill'];
        
        $sql                 = "SELECT `rooms_count` FROM `rooms` WHERE `id` = ".$room_id;
        $result              = $db->query($sql);
        $rooms_count_info    = $db->fetchobject($result);
        $rooms_count         = $rooms_count_info->rooms_count;
        
        $sql                 = "SELECT sum(rooms) as reserved_count FROM `reservation` WHERE `room_id` = '".$room_id."' AND ((`arrival_date` BETWEEN '".$arrival_date."' AND '".$departure_date."') OR (`departure_date` BETWEEN '".$arrival_date."' AND '".$departure_date."'))";
        $result              = $db->query($sql);
        $reserved_rooms_info = $db->fetchobject($result);
        $reserved_rooms      = $reserved_rooms_info->reserved_count;
        
        if($reserved_rooms > 0 && ($reserved_rooms + $rooms) > $rooms_count)
        {
            return -1;
        }
        else
        { 
            $sql    = "INSERT INTO `reservation` (`id`, `name`, `address`, `email`, `phone`, `room_id`, `rooms`, `adults`, `kids`, `arrival_date`, `departure_date`, `special_req`, `no_of_days`, `total_bill`, `status`) 
                       VALUES (NULL, '".$name."', '".$address."', '".$email."', '".$phone."', '".$room_id."', '".$rooms."', '".$adults."', '".$kids."', '".$arrival_date."', '".$departure_date."', '".$special_req."', '".$no_of_days."', '".$total_bill."', '0');";
            
            $result = $db->query($sql);
            
            return 1;  
        }     
    }
    
    
    public function getLatestRooms()
    {
        $db=new Database();
        $db->open();
        $sql="SELECT * FROM `rooms` WHERE published=1 ORDER BY id DESC LIMIT 0,3";
        
        $result=$db->query($sql);
        ?>
        <?php
    
        if($result)
        {
            $category_array = array('1'=>'A/C ROOM', '2'=>'Non-A/C ROOM', '3'=>'STANDARD ROOM');
            while($row = $db->fetcharray($result))
            {
                        
                ?>   
               
               <div class="cpt-item four columns isotope-item suites">
                    <div class="thumb-wrapper">
                        <img src="admin/roomimages/<?php echo $row['image'] ?>" alt="">
                        <div class="thumb-control-wrapper">
                            <ul class="thumb-control clearfix">
                                <li><a title="View Detail" href="room_detail.php?id=<?php echo $row['id'];?>" class="go-detail">Open Detail</a></li>
                                <li><a rel="prettyPhoto" title="<?php echo $row['title'];?> Gallery" href="admin/roomimages/<?php echo $row['image'] ?>" class="go-gallery">Open Gallery</a></li>
                            </ul>
                        </div>
                   </div>
                   <div class="cpt-detail">
                        
                            <h2 class="cpt-title"><a href="room_detail.php?id=<?php echo $row['id'];?>"><?php echo $category_array[$row['room_category']]; ?></a></h2>
                            <h3><?php echo $row['title'];?></h3>
                            <div class="cpt-desc"> from Rs. <?php echo $row['charge'] ?> <a href="reservation.php?room_id=<?php echo $row['id'];?>">Book Now</a></div>
                            <span><?php echo substr($row['description'],0,50);?></span>
                        
                    </div>
                </div>
            
              <?php
            }
        }
        
        ?>
        <?php
    }
     
    public function roomslist()
    {
        $db = new Database();
        $db->open();
        
        $sql    = "SELECT * FROM `rooms` ORDER BY id DESC";
        $result = $db->query($sql);
        
        $category_array = array('1'=>'A/C ROOM', '2'=>'Non-A/C ROOM', '3'=>'STANDARD ROOM');
        
        if($result)
        {
            while($row = $db->fetcharray($result))
            {
                ?>
                <div class="cpt-item four columns isotope-item suites">
                    <div class="thumb-wrapper">
                        <img src="admin/roomimages/<?php echo $row['image'] ?>" alt="">
                        <div class="thumb-control-wrapper">
                            <ul class="thumb-control clearfix">
                                <li><a title="View Detail" href="room_detail.php?id=<?php echo $row['id'];?>" class="go-detail">Open Detail</a></li>
                                <li><a rel="prettyPhoto" title="<?php echo $row['title'];?> Gallery" href="admin/roomimages/<?php echo $row['image'] ?>" class="go-gallery">Open Gallery</a></li>
                            </ul>
                        </div>
                   </div>
                   <div class="cpt-detail">
                        
                            <h2 class="cpt-title"><a href="room_detail.php?id=<?php echo $row['id'];?>"><?php echo $category_array[$row['room_category']]; ?></a></h2>
                            <h3><?php echo $row['title'];?></h3>
                            <div class="cpt-desc"> from Rs. <?php echo $row['charge'] ?> <a href="reservation.php?room_id=<?php echo $row['id'];?>">Book Now</a></div>
                            <span><?php echo substr($row['description'],0,50);?></span>
                        
                    </div>
                </div>
                <?php
            }
        }    
    }
    
    function getRoomDetail($id)
    {
        $db = new Database();
        $db->open();
        
        $sql    = "SELECT * FROM `rooms` WHERE id =".$id;
        $result = $db->query($sql);
        
        $data = $db->fetchobject($result);
        return $data;
    }
    
    function getRoomsOptions()
    {
        $db = new Database();
        $db->open();
        
        $sql    = "SELECT * FROM `rooms` ORDER BY id DESC";
        $result = $db->query($sql);
        
        $room_id        = $_REQUEST['room_id'];
        $category_array = array('1'=>'A/C ROOM', '2'=>'Non-A/C ROOM', '3'=>'STANDARD ROOM');
        
        if($result)
        {
            while($row = $db->fetcharray($result))
            {
                $selected = "";
                if($room_id == $row['id'])
                {
                    $selected = "selected='selected'";
                }
                ?>
                <option value="<?php echo $row['id'];?>" <?php echo $selected;?>><?php echo $row['title'].", Rs. - ".$row['charge'];?></option>
                <?php
            }
            
        }
    }
    
}


?>