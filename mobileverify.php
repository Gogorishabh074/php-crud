<?php
session_start();
    if(isset($_POST['submit'])){
    
        if($_POST['otp'] == $_SESSION['otp']){
         echo "<h2>success</h2>";
      //  unset($_SESSION['otp']);
        header("location: registrationpage.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Verification</title>
</head>
<body>
<form id="mobileform" method="POST" action="verify.php">
            <h2>Mobile Verification</h2>
            <label>Contact No.</label>
            <input type="number" id="mobile" name="mobile" placeholder="enter your mobile number"><br><br>
            <input type="submit" name="send" value="Submit">
        </form>

        <form id="mobileotp" method="POST" action="">
            <h2>Enter OTP </h2>
            <input type="number" id="otpmob" name="otp">
            <input type="submit" id="mobileotpverify" name ="submit" value="submit">
        </form>
</body>
</html>