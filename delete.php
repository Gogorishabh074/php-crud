<?php 
 
 session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "Gogo";
$ID = $_GET["id"];
$conn = mysqli_connect($servername, $username, $password, $database);


echo "Are u there";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  

   $sqldelete = "DELETE FROM Students WHERE `id` = '$ID'";

   if($conn->query($sqldelete) == TRUE){
       echo "Record Deleted SuccessFully";
       header("location: database.php");
   }
   else{
    echo "Error deleting record: " . $conn->error;
   }
?>
