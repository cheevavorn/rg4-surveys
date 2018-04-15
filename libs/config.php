<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "survey_rg4";

    // Create connection
    // $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // } 
    // mysqli_set_charset($conn,"utf8");

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);

    $conn = new mysqli($server, $username, $password, $db);
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