<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/19/2017
 * Time: 10:23 PM
 */

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname="teacherpayroll";

// Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
