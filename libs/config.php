<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "survey_rg4";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    mysqli_set_charset($conn,"utf8");

    // Create database
    // $sql = "CREATE DATABASE myDB";
    // if ($conn->query($sql) === TRUE) {
    //     echo "Database created successfully";
    // } else {
    //     echo "Error creating database: " . $conn->error;
    // }

    // $conn->close();
?>