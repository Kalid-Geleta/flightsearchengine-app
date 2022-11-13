<?php 
  session_start();

  require('../../dbconnection.php');
  $ids=$_COOKIE['id'];
  $con1= new dbcon();
  $sql=" select phonenumber,firstname from userdetails where email=?";
  $stmt = $con1->returnprepared($sql);
  $stmt->bind_param("s",$ids);
  $stmt->execute();
  $result=$stmt->get_result()->fetch_assoc();
  $number=$result['phonenumber'];
  $firstname=$result['firstname'];
  
 
  $number="254".$number;
  echo $number.'<br>';

	$consumerKey = 'zrrdmPbpcoUZhWar416QsYyTjVU27eyi'; //Fill with your app Consumer Key
	$consumerSecret = 'B3c8JAsuGHy2tQy4'; // Fill with your app Secret

	$headers = ['Content-Type:application/json; charset=utf8'];

	$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_HEADER, FALSE);
	curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
	$result = curl_exec($curl);
	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	$result = json_decode($result);

	$access_token = $result->access_token;

	echo $access_token;
	
	curl_close($curl);
   $BusinessShortCode  = '174379';
  $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
    $Timestamp = date('YmdHis');    
    $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    $CallBackURL = 'https://ics2b.cf/callback.php'; 
    $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $initiate_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type:application/json','Authorization:Bearer '.$access_token]); 
  
    $curl_post_data = array(
     
      'BusinessShortCode' => "174379",
      'Password' =>$Password ,    
      'Timestamp' => $Timestamp,
      'TransactionType' => 'CustomerPayBillOnline',
      'Amount' => '1',
      'PartyA' => $number,
      'PartyB' => "174379",
      'PhoneNumber' => $number,
      'CallBackURL' => $CallBackURL,
      'AccountReference' => '79288302',
      'TransactionDesc' => 'pro done '
    );
  
    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);
    print_r($curl_response);
  
    echo $curl_response;
    $con2= new dbcon();
    $sql="insert into orderdetails(id,orgin,destination,depaturedate,destinationdate,firstname,phonenumber)values(?,?,?,?,?,?,?)";
$stmt = $con2->returnprepared($sql);
$stmt->bind_param("sssssii",$_COOKIE['id'],$_SESSION['assoc']['itineraries'][0]['segments'][0]['departure']['iataCode'],$_SESSION['assoc']['itineraries'][0]['segments'][count($_SESSION['assoc']['itineraries'][0]['segments'])-1]['arrival']['iataCode'],explode("T",$_SESSION['assoc']['itineraries'][0]['segments'][0]['departure']['at'])[0],explode("T",$_SESSION['assoc']['itineraries'][0]['segments'][count($_SESSION['assoc']['itineraries'][0]['segments'])-1]['arrival']['at'])[0],$firstname,$number);
$stmt->execute();



?>