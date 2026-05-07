<?php
    $server_name = "localhost";
    $user_name = "root";
    $password = "";
    $database_name = "student_management1";
    // my local device mySQL port is 3307
    $port = 3307;

    $conn = mysqli_connect($server_name, $user_name, $password, $database_name, $port);

    if (!$conn) {
        // Fail early with useful message for debugging in development.
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Do not echo or close the connection here — caller scripts will use and close it.
?>