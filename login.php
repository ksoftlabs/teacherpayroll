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

</head>
<body>
<div class="container">
    <div class="row"><h2>User Login</h2></div>

    <form  class="column1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <div class="row">
            <div class="input-field column1">
                <input type="text" id="username" name="username" value="<?php echo $u_username;?>">
                <label for="username">User Name</label>
                <span><?php echo $errusername ?></span>
            </div>
        </div>

        <div class="row">
            <div class="input-field column1">
                <input type="password" id="pass" name="pass" value="<?php echo $u_pass;?>">
                <label for="pass1">Password</label>
                <span><?php echo $errpass ;?></span>
            </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit" name="submit" value="Submit">Submit</button>
    </form>


</div>
</body>
</html>