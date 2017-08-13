<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 8/13/2017
 * Time: 9:03 PM
 */
session_start();
include_once "connect.php";
$uname=$password="";

if (empty($_POST["name"])) {
    $uname = $_SESSION['uname'];
} else {
    $uname = mysqli_real_escape_string($conn,$_POST["uname"]);
}

if (empty($_POST["password"])) {
    $password = $_SESSION['password'];
} else {
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
}


if(!isset($uname)) {
    ?>
    <html>
    <head>
        <title> Please Log In for Access </title>
    </head>
    <body>
    <h1> Login Required </h1>
    <p>You must log in to access this area of the site. If you are
        not a registered user, <a href="register_user.php">click here</a>
    </p>
    <p><form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
        User  Name: <input type="text" name="uname"  /><br />
        Password: <input type="password" name="password"/><br />
        <input type="submit" value="Log in" />
    </form></p>
    </body>
    </html>
    <?php
    exit;
}

$_SESSION['uname'] = $uname;
$_SESSION['password'] = $password;

$user_pass=password_hash($password,PASSWORD_DEFAULT);

$sql="SELECT user_name,user_pass FROM users WHERE user_username='$uname' AND user_pass='$user_pass'";

if (mysqli_query($conn, $sql)) {
    $result = $conn->query($sql);
} else {
    #header('Location:create_user_failed.php');
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

if($result->num_rows==0){
    return "Teacher ID Exists";
    unset($_SESSION['uname']);
    unset($_SESSION['password']);
    ?>
    <html>
    <head>
        <title> Access Denied </title>
    </head>
    <body>
    <h1> Access Denied </h1>
    <p>Your user ID or password is incorrect, or you are not a
        registered user on this site. To try logging in again, click
        <a href="<?=$_SERVER['PHP_SELF']?>">here</a>. To register  click <a href="register_user.php">here</a>.</p>
    </body>
    </html>
    <?php
    exit;
}
