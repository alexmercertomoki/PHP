<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 12/1/15
 * Time: 11:10
 */


        $name = $_POST["name"];
        $email = $_POST["email"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "phpclass";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";

        $sql = "INSERT INTO caremail (identity, email) VALUES (".$name.",".$email.")";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();


?>

