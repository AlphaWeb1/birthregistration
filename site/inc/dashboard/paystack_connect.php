<?php

$curl = curl_init();

$email = $email;
// factor in the discount but ask boss first
$amount = $amount*100;  //the amount in kobo. This value is actually NGN 300

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'email'=>$email,
  ]),
  CURLOPT_HTTPHEADER => [
    "authorization: Bearer ".$paymentConfig->paystack["test_sk"], //replace this with your own test key sk_test_664d85ab0350ee3772f57f18fefa7f2ca38379ce
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if(!empty($err) and $err){
  // there was an error contacting the Paystack API
  error_log('Curl returned error: ' . $err);
	$fail.='<p>'.'Curl returned error: ' . $err.'</p>';
}else{
	$tranx = json_decode($response, true);

	if(!$tranx->status){
	  // there was an error from the API
	  // print_r('API returned error: ' . $tranx['message']);
	  $fail.='<p>'.'API returned error: ' . $tranx['message'].'</p>';
	}

	// comment out this line if you want to redirect the user to the payment page
	// print_r($tranx);
	// error_log(json_encode($tranx ));
	// Added by Me
	// End Added By me
	// redirect to page so User can pay
	// uncomment this line to allow the user redirect to the payment page
	header('Location: ' . $tranx['data']['authorization_url']);
	/*End Payshack Payment*/
}