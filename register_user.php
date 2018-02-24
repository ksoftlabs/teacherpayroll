<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/25/2017
 * Time: 10:08 AM
 *
 * This file is part of EasyPay Teacher Payroll System
 *
 * EasyPay Teacher Payroll System is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 *
 * EasyPay Teacher Payroll System  is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
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
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row text-center"><h2>User Registraion</h2></div>

    <form  class="column2center text-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
            <div class="column1">
                <label for="name">Name</label>
                <input class="display-inline" type="text" name="name" id="name" value="<?php echo $u_name;?>">

                <span><?php echo $errname ?></span>
            </div>
        </div>

        <div class="row">
            <div class="column1">
                <label for="username">User Name</label>
                <input class="display-inline" type="text" id="username" name="username" value="<?php echo $u_username;?>">

                <span><?php echo $errusername ?></span>
            </div>
        </div>

        <div class="row">
            <div class="column1">
                <label for="pass1">Password</label>
                <input type="password" id="pass1" name="pass1" value="<?php echo $u_pass1;?>">

                <span><?php echo $errpass1 ;?></span>
            </div>
        </div>

        <div class="row">
            <div class="column1">
                <label for="pass2">Confirm Password</label>
                <input type="password" id="pass2" name="pass2" value="<?php echo $u_pass2;?>">

                <span><?php echo $errpass2 ;?></span>
            </div>
        </div>

        <button class="btn" type="submit" name="submit" value="Submit">Submit</button>
    </form>
    <div>
        <p class="text-center">Click <a href='login.php'>here</a> to login.</p>
    </div>

</div>
<?php
include "footer.php";
?>