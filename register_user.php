<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/25/2017
 * Time: 10:08 AM
 */
include "connect.php";
include "functions.php";

$u_name=$u_username=$u_pass1=$u_pass2="";
$errname=$errusername=$errpass1=$errpass2="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $errname = "Name is required";
    } else {
        $u_name = mysqli_real_escape_string($conn,$_POST["name"]);
        $errname = validate_text($u_name);
    }

    if (empty($_POST["username"])) {
        $errusername = "Username is required";
    } else {
        $u_username = mysqli_real_escape_string($conn,$_POST["username"]);
        $errusername = validate_username($u_username);
    }

    if (empty($_POST["pass1"])) {
        $errpass1 = "Password is required";
    } else {
        $u_pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
        $errpass1 = validate_text_and_numbers($u_pass1);
    }

    if (empty($_POST["pass2"])) {
        $errpass2 = "Confirm password is required";
    } elseif($_POST["pass1"]!=$_POST["pass2"]){
        $errpass2="Passwords Do not match";
    }else {
        $u_pass2 = mysqli_real_escape_string($conn,$_POST["pass2"]);
        $errpass2 = validate_text_and_numbers($u_pass2);
    }

    if($errname=="" and $errusername=="" and $errpass1=="" and $errpass2==""){
        create_user($u_name,$u_username,$u_pass1);
    }
}

?>

<html>
<head>

</head>
<body>
<div class="container">
    <div class="row"><h2>User Registraion</h2></div>

    <form  class="column1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
            <div class="input-field column1">
                <input type="text" name="name" id="name" value="<?php echo $u_name;?>">
                <label for="name">Name</label>
                <span><?php echo $errname ?></span>
            </div>
        </div>

        <div class="row">
            <div class="input-field column1">
                <input type="text" id="username" name="username" value="<?php echo $u_username;?>">
                <label for="username">User Name</label>
                <span><?php echo $errusername ?></span>
            </div>
        </div>

        <div class="row">
            <div class="input-field column1">
                <input type="password" id="pass1" name="pass1" value="<?php echo $u_pass1;?>">
                <label for="pass1">Password</label>
                <span><?php echo $errpass1 ;?></span>
            </div>
        </div>

        <div class="row">
            <div class="input-field column1">
                <input type="password" id="pass2" name="pass2" value="<?php echo $u_pass2;?>">
                <label for="pass2">Confirm Password</label>
                <span><?php echo $errpass2 ;?></span>
            </div>
        </div>

        <button class="btn" type="submit" name="submit" value="Submit">Submit</button>
    </form>


</div>
<?php
include "footer.php";
?>