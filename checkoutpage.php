<?php
session_start();
$json1="";
if(isset($_POST['btn_click'])){
    $json1=$_POST['btn_click'];
}
else if(isset($_SESSION['btn_click'])){
    $json1=$_SESSION['btn_click'];
}

   

//echo $json1;
$assocArray = json_decode($json1, true);
// echo '<pre>';
// echo print_r($assocArray);
// echo '</pre>';
// $o=" jjd ";
// echo 'true4 '.$o. 'colors
// kjnkjkjnkjnkjnkn\'
// bruv';
$_SESSION['assoc']=$assocArray;

$compiled="";
for($j=0;$j<count($assocArray['itineraries']);$j++){
    $reusable="";
   $b="1";
    for ($i=0; $i < count($assocArray['itineraries'][$j]['segments'])-1; $i++) {
        $reusable.='<div class="testin2">
        <div class="testinin3top">
            <span>'.$assocArray['itineraries'][$j]['segments'][$i]['arrival']['iataCode'].'</span>
        </div>
    
        <div class="testinin3">
    
        </div>
        <div class="testinin3bottom">
            
           <span>'.$assocArray['itineraries'][$j]['segments'][$i]['duration'].'</span>
        </div>
    
    </div>
    
    ';}
    if($j==0){
        $b="<h1>Flight</h1>";
    }
else{
    $b="<h1>Return Flight</h1>";
}

 $compiled.= $b.'<div class="inclass">
         
<div class="inininclass2">
    <div class="ininininclass">
        <div class="durationandstops">
            <div>
            <span>'.(count($assocArray['itineraries'][$j]['segments'])-1).' Stop</span>
            <span>32h 0m</span>
            </div>
            <div>
                <span>Arives :</span>
                <span>'.explode("T",$assocArray['itineraries'][$j]['segments'][count($assocArray['itineraries'][$j]['segments'])-1]['arrival']['at'])[0].'</span>
                </div>


            

        </div>
        <div class="segementsandtime">
            <img src="plane.png" width="40px" height="40px">
            <div class="timeandiata">
                <span>'.explode("T",$assocArray['itineraries'][$j]['segments'][0]['departure']['at'])[1].'</span>
                <span>'.$assocArray['itineraries'][$j]['segments'][0]['departure']['iataCode'].'</span>
                
            </div>
            
         <div class="test">
            <div class="testin">'
               
              .$reusable.'
            </div>
          
            
        </div>
        <div class="timeandiata">
            <span>'.explode("T",$assocArray['itineraries'][$j]['segments'][count($assocArray['itineraries'][$j]['segments'])-1]['arrival']['at'])[1].'</span>
            <span>'.$assocArray['itineraries'][$j]['segments'][count($assocArray['itineraries'][$j]['segments'])-1]['arrival']['iataCode'].'</span>

        </div>
        </div>

    </div>
    <div class="inininininclass">

    </div>

</div>



</div>
';


    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
</head>
<body>
<div id="contain2">
    <?php echo $compiled ?>
</div>
<div id="contain3">
<div class="cc31">
<div class="cc311">
<div class="cc3311">
<span>Number Of Bookable Seats:<?php echo $assocArray['numberOfBookableSeats']; ?></span>
<span>Last Ticketing Date:<?php echo $assocArray['lastTicketingDate']; ?></span>
<span>One Way:<?php if( $assocArray['oneWay']){ echo " Yes";}else{ echo " No";}; ?></span>
<span>Non homogeneous:<?php if( $assocArray['nonHomogeneous']){ echo " Yes";}else{ echo " No";}; ?></span>
<span>Instant Ticketing Required:<?php if( $assocArray['instantTicketingRequired']){ echo " Yes";}else{ echo " No";}; ?></span>
</div>
</div>


<div class="cc311">
    <div class="cc3311">
<span>Source: <?php echo $assocArray['source']; ?></span>
<span>Price Base:<?php echo $assocArray['price']['base']; ?></span>
<span>Currency:<?php echo $assocArray['price']['currency']; ?></span>
<span>Included Checked Bags Only:<?php if( $assocArray['pricingOptions']['includedCheckedBagsOnly']){ echo " Yes";}else{ echo " No";}; ?></span>
</div>
</div>

</div>
<div class="cc32">
    <span id="ky" class="cost"><h3>Total:<?php echo $assocArray['price']['grandTotal']?></h3></span>
    <form method="post" action="m-pesa/test/index.html">
<button class="sel" id="ky">Check Out</button>
</form>
</div>
</div>
</body>
</html>
