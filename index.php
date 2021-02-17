<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "Gogo";

$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

  if(isset($_POST["LOGIN"])){
      $email = $_POST["email"];
      $password = $_POST["password"];

      $sql = "SELECT * FROM Students WHERE `EMAIL` = '$email' AND `PASSWORD` = '$password' ";


      $result = $conn->query($sql);

      if($result->num_rows > 0){
          header("location: database.php");
      }
      else{
          echo "Inavlid Credentials please try again";
      }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <style>
        body {
            margin: 0;
            padding: 0;

        }

        h1 {
            text-decoration: underline;
        }

        .container {
            margin-top: 10%;
            text-align: center;
            border: 1px solid black;
            width: 40%;
            margin-left: auto;
            margin-right: auto;

        }

        form {
            padding-bottom: 30px;
        }


        input[type="submit"] {
            width: 80px;
            padding: 5px;
            font-size: 15px;
            margin-right: 10px;
        }

        #signup {
            background: #E5E5E5;
            padding: 5px;
            border: 1px solid #808080;
            text-decoration: none;
            border-radius: 2px;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Student Login Page</h1>
        <form method="POST" action="">
            <label>USERNAME</label>
            <input type="text" name="email" placeholder="enetr your email"><br><br>

            <label>PASSWORD</label>
            <input type="text" name="password" placeholder="enter Your password"><br><br>

            <input type="submit" name="login" value="LOGIN">

            <a id="signup" href="register.php">SIGN UP</a>

        </form>
    </div>
</body>

</html>