
<?php

session_start();

require('dbconnection.php');
$ids=$_COOKIE['id'];
$con1= new dbcon();
$sql=" select firstname from userdetails where email=?";
$stmt = $con1->returnprepared($sql);
$stmt->bind_param("s",$ids);
$stmt->execute();
$result=$stmt->get_result()->fetch_assoc();
$firstname=$result['firstname'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <title>KFLY</title> 
</head>
<body>
    <div class="viewcontain">
        <div class="viewcontain1">
            <h4>KFLYSEARCH</h4>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href><?php echo "Hi ".$firstname;?></a></li>
            <form method="POST" action="index.php">    <li><button type="submit" name="logout" value="123">logout</button></li></form>
              
            </ul>

        </div>
    </div>
    <diV class="viewcontain2">
        <div class="location">
            <label>From:</label>
            <div id="c1">
            
            </div>
        </div>
        <div class="location">
            <label>To:</label>
            <div id="c2">
           
        </div>

        </div>
        <diV class="dtime">
            <label>Check-in :</label>
            <input type="date" id="od3" >

        </diV>
        <div class="rtime">
            <label>Check-out :</label>
             <input type="date" id="od4">
        </div>
        <div class="guest">
            <label>Guest :</label>
            <input type="text" id="od5">

        </div>
        <div class="btn_search" >
      <button id="od6">Find Flights</button>
        </div>


    </diV>
    <form action="checkoutpage.php" method="post">
    <div id="contain">
    </div>
    </form>
    <div class="viewcontain3">
        <div class="x1">
            
     </div>
            <div class="x2">
                <div class="imgbackground"><img src="images/Airplane.png" width="90px" height="90px"></div>
                <h3>Amazing Travel</h3>
                <p>We can learn about the world, from academic study. But it never gives us the real experience, only traveling can do this. When you will travel, you can see the real beauty and real scene of a place. People are traveling all across the world for different purposes.</p>
            </div>
            
            <div class="x3">
                 <div class="imgbackground"> <img src="images/Ship.png"  width="90px" height="90px"></div>
                 <h3>Our Cruises</h3>
                 <p>
                    Cruise ships are a wonderful vacation destination. Whether relaxation is needed, to get away from any worries until the voyage has come to an end.</p>
            </div>
            <div class="x4">
                <div class="imgbackground"> <img src="images/Car-1.png"  width="90px" height="90px"></div>
               <h3>Book Your Trip</h3>
                <p>We got you covered with all your Holiday,Busines,Academics or those abrupt catch up trips with friends.</p>
            </div>
            <div class="x5">
                
                <div class="imgbackground">
                    <img src="images/Postcard.png"  width="90px" height="90px">
                </div>
                <h3>Nice Support</h3>
                <p>We run a non-profit childrens Care. Your continued Support is highly Appreciated.</p>
            </div>
         
          

    </div>

    <div class="footer">
<div class="insidefooter">
<div class="hg">
    <h3> Kflysearch Travel 
    </h3>
    <p>Offering you the best holiday Deals for your Family and Loved Ones.</p>

</div>
<div class="hg">
    <h3>Contact Information</h3>
    
    <li>madaraka ,Avenue</li>
<li>Nairobi Kenya</li>
<li>+254707093963</li>
<li>kalidgeleta28@gmail.com</li>
<li>kflysearch.cf</li>
    


</div>
</div>
    </div>
    <script  src="conf.js"></script>
</body>
</html>