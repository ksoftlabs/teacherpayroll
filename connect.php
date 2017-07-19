<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/19/2017
 * Time: 10:23 PM
 */

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="teacherpayroll";

// Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
