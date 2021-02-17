<?php
session_start();
//print_r($_SESSION);
$servername = "localhost";
$username = "root";
$password = "";
$database = "Gogo";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];

    $sql = "INSERT INTO Students (`NAME`, `GENDER`, `EMAIL`, `PASSWORD`, `MOBILE`, `CITY`)
    VALUES ('$name', '$gender', '$email', '$password', '$mobile', '$city')";

    if ($conn->query($sql) == TRUE) {
        echo "New record created successfully";
        header("location: database.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
</head>

<body>
    <div style="text-align: center;">
        <h2>Student Registartion Form</h2>
        <form method="POST" action="">
            <label>Name</label>
            <input type="text" name="name"><br><br>
            <label>Gender</label>
            <input type="radio" name="gender" value="male"><label>Male</label>
            <input type="radio" name="gender" value="Female"><label>Female</label>
            <input type="radio" name="gender" value="other"><label>Other</label><br><br>
            <label>Username</label>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" readonly><br><br>
            <label>Password</label>
            <input type="password" id="password" name="password" value="<?php echo $_SESSION['password']; ?>" readonly><br><br>
            <label>Contact No.</label>
            <input type="number" id="mobile" name="mobile" value="<?php echo $_SESSION['mobile']; ?>" readonly><br><br>
            <label>City</label>
            <input type="text" name="city"><br><br>
            <input type="submit" name="Submit" value="submit">
        </form>
    </div>
</body>

</html>