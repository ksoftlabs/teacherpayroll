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
    echo "<html><head><link href=\"style.css\" rel=\"stylesheet\"></head><body><div class='column2center text-center' ><h2>Access Denied. </h2><h2>Admin Access Required.</h2>Click <a href='login.php'>here</a> to log in</div></body></html>";
    die();
}
?>