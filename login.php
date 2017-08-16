<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 8/15/2017
 * Time: 9:30 AM
 */

include "connect.php";
include "functions.php";

$u_username=$u_pass="";
$errusername=$errpass="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $errusername = "Username is required";
    } else {
        $u_username = mysqli_real_escape_string($conn,$_POST["username"]);
        $errusername = validate_text($u_username);
    }

    if (empty($_POST["pass"])) {
        $errpass = "Password is required";
    } else {
        $u_pass = mysqli_real_escape_string($conn,$_POST["pass"]);
        $errpass = validate_text_and_numbers($u_pass);
    }

    if($errusername=="" and $errpass==""){
        user_login($u_username,$u_pass);

    }
}

?>

<html>
<head>
    <title>Teacher Payroll System</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row"><h2 class="text-center">User Login</h2></div>
    <div class="row">
    <div class="column2center text-center">
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <div class="row">
            <div class="input-field column1">
                <label for="username">User Name</label>
                <input class="display-inline" type="text" id="username" name="username" value="<?php echo $u_username;?>">

                <span><?php echo $errusername ?></span>
            </div>
        </div>

        <div class="row">
            <div class="input-field column1">
                <label for="pass1">Password</label>
                <input type="password" id="pass" name="pass" value="<?php echo $u_pass;?>">

                <span><?php echo $errpass ;?></span>
            </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit" name="submit" value="Submit">Submit</button>
    </form>
    </div>
    </div>

</div>
</body>
</html>