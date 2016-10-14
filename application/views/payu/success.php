<?php
$payment_order_details = array();
if(!empty($_POST["status"])) {
  $status=$_POST["status"];
  $firstname=$_POST["firstname"];
  $address1=$_POST["address1"];
  $address2=$_POST["address2"];
  $city=$_POST["city"];
  $area=$_POST["country"];
  $phone=$_POST["phone"];
  $zipcode=$_POST["zipcode"];
  $udf1=$_POST["udf1"]; // order_session_id
  $udf2=$_POST["udf2"]; // state

  $amount=$_POST["amount"];
  $txnid=$_POST["txnid"];
  $posted_hash=$_POST["hash"];
  $key=$_POST["key"];
  $productinfo=$_POST["productinfo"];
  $email=$_POST["email"];
}
$salt="RjWAdXh0";

If (isset($_POST["additionalCharges"])) {
  $additionalCharges=$_POST["additionalCharges"];
  $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||'.$udf2.'|'.$udf1.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
}
else if(!empty($_POST["status"])) {	  
  $retHashSeq = $salt.'|'.$status.'|||||||||'.$udf2.'|'.$udf1.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
}
else {
  $retHashSeq = 0;
  $posted_hash=0;
}
$hash = hash("sha512", $retHashSeq);
if ($hash != $posted_hash) {
  echo "Invalid Transaction. Please try again";
}
else { 
  $payment_order_details = array($status,$firstname,$address1,$address2,$city,$area,$phone,$zipcode,$udf1,$udf2,$amount,$email);
  // print_r($payment_order_details);
  $user_details = insert_order_details($payment_order_details);
  echo $user_details;
  echo "<h3>Thank You. Your order status is ". $status .".</h3>";
  echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
  echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
}         
?>	
<p> Go to <a href="<?php echo base_url(); ?>"> Home </a></p>