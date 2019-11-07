<?php
    $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';
    
    $access_token = ''; // check file mpesa_accesstoken.php.    
    $ShortCode  = ''; // Shortcode. Same as the one on register_url.php
    $amount     = ''; // amount the client/we are paying to the paybill
    $msisdn     = ''; // phone number paying 
    $billRef    = ''; // This is anything that helps identify the specific transaction. Can be a clients ID, Account Number, Invoice amount, cart no.. etc

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));


    $curl_post_data = array(
           'ShortCode' => '600502',
           'CommandID' => 'CustomerPayBillOnline',
           'Amount' => '527',
           'Msisdn' => '0700258980',
           'BillRefNumber' => 'SIM001 '
    );

    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);
    print_r($curl_response);

    echo $curl_response;
?>
