<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "Gogo";
$ID = $_GET["id"];
$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];

    $sqlupdate = "UPDATE Students SET `NAME` = '$name', `GENDER` = '$gender',`EMAIL` = '$email', `PASSWORD` = '$password',
    `MOBILE` = '$mobile', `CITY`='$city' WHERE `id`= '$ID' ";

    if ($conn->query($sqlupdate) == TRUE) {
        echo "Record updated successfully";
        header("location: database.php");
       
    } else {
        echo "Error updating record: " . $conn->error;
        
    }
    
}



//echo $ID;

$sql = "SELECT * from Students WHERE `id` = '$ID' ";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating database</title>
</head>

<body>
    <div style="text-align: center;">
        <h2>Student Registartion Form</h2>
        <?php while ($row = $result->fetch_assoc()) {
        ?>

            <form method="POST" action="">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $row["NAME"]; ?>"><br><br>

                <label>Gender</label>
                <input type="radio" name="gender" value="<?php echo $row["GENDER"]; ?>"> <label>Male</label>
                <input type="radio" name="gender" value="<?php echo $row["GENDER"]; ?>"> <label>Female</label>
                <input type="radio" name="gender" value="<?php echo $row["GENDER"]; ?>"> <label>Other</label><br><br>

                <label>Username</label>
                <input type="email" id="email" name="email" value="<?php echo $row["EMAIL"]; ?>" readonly><br><br>

                <label>Password</label>
                <input type="password" id="password" name="password" value="<?php echo $row["PASSWORD"]; ?>" readonly><br><br>

                <label>Contact No.</label>
                <input type="number" id="mobile" name="mobile" value="<?php echo $row["MOBILE"]; ?>" readonly><br><br>

                <label>City</label>
                <input type="text" name="city" value="<?php echo $row["CITY"]; ?>"><br><br>

                <input type="submit" name="submit" value="submit">
            </form>

        <?php
        }
        ?>
    </div>
    <php ?>

</body>

</html>