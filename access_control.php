<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 8/13/2017
 * Time: 9:03 PM
 */
session_start();

if(!isset($_SESSION['userid'])){
    echo"<html><head></head><body><h2>Access Denied. </h2>Click <a href='login.php'>here</a> to log in</body></html>";
    die();
}
?>