<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $otp = rand(111111, 999999);
    $_SESSION["otp"] = $otp;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //SMTP Settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "aakashianrishabh01@gmail.com"; //enter you email address
    $mail->Password = 'Duffer@074'; //enter you email password
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email);
    $mail->addAddress("aakashianrishabh01@gmail.com"); //enter you email address
    $mail->Subject = ("$email");
    $mail->Body =  "Your One time verification OTP is $otp kindly enter 
    it to the required field to verify your mail.";

    if ($mail->send()) {
        $status = "success";
        $response = "email is sent!";
        $formdata = $_POST;
    } else {
        $status = "Failed";
        $response = "something went wrong: <br><br>" . $mail->ErrorInfo;
    }
    exit(json_encode(array("status" => $status, "response" => $response,
        "formdata" => $formdata, "otp" => $otp)));
}
?>
