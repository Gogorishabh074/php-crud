<?php
session_start();
$otp = rand(1111, 9999);    //creating the otp using the random  function
$_SESSION["otp"] = $otp; //storing the otp in session
$fields = array(
    "sender_id" => "CHKSMS",
    "message" => "2",   // change the messege id
    "variables_values" => $otp, // value of the otp
    "route" => "s",
    "numbers" => $_POST['mobile']    //accessing  the mobile number 
);
$_SESSION['mobile'] = $fields['numbers'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($fields),
    CURLOPT_HTTPHEADER => array(
        "authorization: UCJrGZvklSPo9pIh2Rw1VA705egXzTq4jWxcBNiQmKY3ua8Dbd4M2AwPt3NKqYdSyeOulL17IXHmnbEW", // enter your api key here
       "accept: */*",
        "cache-control: no-cache",
        "content-type: application/json"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
}
 else {
   header("location: mobileverify.php");  // redirecting to the desired path
//    echo "success";
}
