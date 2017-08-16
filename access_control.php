<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 8/13/2017
 * Time: 9:03 PM
 */
session_start();
if(!isset($_SESSION['userid'])){
    echo "<html><head><link href=\"style.css\" rel=\"stylesheet\"></head><body><div class='column2center text-center' ><h2>Access Denied. </h2>Click <a href='login.php'>here</a> to log in</div></body></html>";
    die();

}

?>