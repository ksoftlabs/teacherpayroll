<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/19/2017
 * Time: 10:22 PM
 */
require "connect.php";
require "functions.php";
require "access_control.php";

$t_id=$t_name=$t_account=$t_gross="";
$errid=$errname=$erraccount=$errgross="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {
        $errid = "ID is required";
    } else {
        $t_id = mysqli_real_escape_string($conn,$_POST["id"]);
        $errid = validate_id($t_id);
    }

    if (empty($_POST["name"])) {
        $errname = "Name is required";
    } else {
        $t_name = mysqli_real_escape_string($conn,$_POST["name"]);
        $errname = validate_text($t_name);
    }

    if (empty($_POST["account"])) {
        #$errname = "Account is required";
    } else {
        $t_account = mysqli_real_escape_string($conn,$_POST["account"]);
        $erraccount = validate_number($t_account);
    }

    if (empty($_POST["gross"])) {
        $errgross = "Gross Salary is required";
    } else {
        $t_gross = mysqli_real_escape_string($conn,$_POST["gross"]);
        $errgross = validate_number($t_gross);
    }

    if($errid==""and $errname=="" and $erraccount==""and $errgross==""){
        add_teacher($t_id,$t_name,$t_account,$t_gross);
        $t_id=$t_name=$t_account=$t_gross="";
    }

}
?>


<html>

<body>
<div class="container">
    <div class="row"><h2>Add A Teacher</h2></div>

    <form  class="col s12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
            <div class="input-field col s12">
                <input id="id" name="id" type="text" value="<?php echo $t_id;?>">
                <label for="name">ID</label>
                <span><?php echo $errid ?></span>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="name" id="name" value="<?php echo $t_name;?>">
                <label for="email">Name</label>
                <span><?php echo $errname ?></span>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <input type="text" id="account" name="account" value="<?php echo $t_account;?>">
                <label for="contact">Account Number</label>
                <span><?php echo $erraccount ?></span>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <input type="text" id="gross" name="gross" value="<?php echo $t_gross;?>">
                <label for="title">Gross Salary</label>
                <span><?php echo $errgross ;?></span>
            </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit" name="submit" value="Submit">Submit</button>

        <div>
            <?php
            view_teacher_list();
            ?>
        </div>
    </form>


</div>
</body>
</html>

