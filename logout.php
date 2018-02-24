<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 8/13/2017
 * Time: 11:07 PM
 */
session_start();
session_destroy();

echo '<script>window.location="login.php"</script>';