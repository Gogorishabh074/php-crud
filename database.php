<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataBase Page</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
        }

        h2 {
            text-align: center;
            font-size: 25px;

        }

        table tr td {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        tr>th {
            border: 1px solid black;
            padding: 5px;
            font-size: 20px;
        }

        td {
            text-align: center;
            padding: 5px;
        }
    </style>
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Gogo";

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


   
    $sqlview = "SELECT * from Students";
    $result = $conn->query($sqlview);


    if ($result->num_rows > 0) {
        echo "<h2>Students Table </h2>";
        echo '<table>' .
            '<tr>' .
            "<th><b>ID<b></th>" .
            "<th><b>NAME<b></th>" .
            "<th><b>GENDER<b></th>" .
            "<th><b>EMAIL<b></th>" .
            "<th><b>PASSWORD<b></th>" .
            "<th><b>MOBILE<b></th> " .
            "<th><b>CITY<b></th>" .
            "<th><b>ACTION1<b></th>" .
            "<th><b>ACTION2<b></th>" .
            "</tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr>' .
                "<td>" . $row["ID"] . "</td>" .
                "<td>" . $row["NAME"] . "</td>" .
                "<td>" . $row["GENDER"] . "</td>" .
                "<td>" . $row["EMAIL"] . "</td>" .
                "<td>" . $row["PASSWORD"] . "</td>" .
                "<td>" . $row["MOBILE"] . "</td>" .
                "<td>" . $row["CITY"] . "</td>" .
                '<td><button><a href = "update.php?id=' . $row["ID"] . '">UPDATE</a></button></td>' .
                '<td><button><a href = "delete.php?id=' . $row["ID"] . '">DELETE</a></button></td>' .
                "</tr>";
        }
    } else {
        echo "0 results";
    }



    ?>
</body>

</html>