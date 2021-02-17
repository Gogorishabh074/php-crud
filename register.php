<?php
session_start();
 
?>

<!DOCTYPE html>
<html>

<head>
    <title>Reistation page</title>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>

<body>

        <div style="text-align: center;">

        <h1>Registration form</h1>

        <form id="registrationform" method="POST" action="">
            <label>Username</label>
            <input type="email" id="email" name="email" placeholder="enter your mail id"><br><br>
            <label>Password</label>
            <input type="password" id="password" name="password" placeholder="create passowrd"><br><br>
            <button type="button" onclick="sendEmail()" name="send" value="Send An Email">Submit
            </button>
        </form><br>

        <form id="emailotp">
            <h2>Enter otp for verfication</h2>
            <input id="otpmail" type="number" placeholder="enter otp here">
            <input type="button" id="emailotpverify" value="Enter">
            <br><br>
            
        </form>
        </div>
    


    <script type="text/javascript">
        function sendEmail() {
            //console.log("hello there ");
            var email = $("#email");
            var password = $("#password");

            if (email !== "" && password!=="") {
                //console.log("i got this");
                $.ajax({
                    url: 'sendemail.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        email: email.val(),
                        password: password.val(),
                    },
                    success: function(response) {
                        // console.log("are u there");
                        $('#registrationform')[0].reset();
                        alert("OTP For verification has been sent to your email");
                      //  console.log("hey there!!!!!!");
                        document.getElementById("emailotp").style.display = "block";
                        $("#emailotpverify").click(function() {
                            var emailotp = $("#otpmail").val();
                            if (emailotp == response.otp) {
                                alert("Your mail has been verified now please proceed for mobile verification");
                                document.location.href = "http://localhost/AJAX/test/mobileverify.php";
                            }
                        });
                    }
                });
            }
        }
    </script>
</body>

</html>