<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 8/16/2017
 * Time: 6:51 AM
 */

session_start();
if(!isset($_SESSION['usertype'])){
    $_SESSION['usertype']=0;
}


if($_SESSION['usertype']!=1){
    echo "<html><head></head><body><h2>Access Denied. Admin Login Required.</h2>Click <a href='login.php'>here</a> to log in</body></html>";
    die();
}
?>