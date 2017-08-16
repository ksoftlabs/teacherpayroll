<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/21/2017
 * Time: 7:46 PM
 */

require "connect.php";
require "functions.php";
include "access_control.php";
include "header.php";

$t_id=$t_name=$t_account=$t_gross="";
$errid=$errname=$erraccount=$errgross="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {

    } else {
        $t_id=$_POST["id"];
    }

    if (empty($_POST["name"])) {

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
    } else {
        $t_gross = mysqli_real_escape_string($conn,$_POST["gross"]);
        $errgross = validate_number($t_gross);
    }

    if($errid==""and $errname=="" and $erraccount==""and $errgross==""){
        edit_teacher($t_id,$t_name,$t_account,$t_gross);
    }

}
?>


<div class="column6">
    <div class="row"><h2>Edit A Teacher Record</h2></div>

    <form  class="column1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
            <div class="input-field column1">
                <label for="id">Select ID</label>
                <select name="id" id="id">
                    <?php
                    construct_id_select();
                    ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="input-field column1">
                <input type="text" name="name" id="name" value="">
                <label for="email">Name</label>
                <span><?php echo $errname ?></span>
            </div>
        </div>

        <div class="row">
            <div class="input-field column1">
                <input type="text" id="account" name="account" value="">
                <label for="contact">Account Number</label>
                <span><?php echo $erraccount ?></span>
            </div>
        </div>

        <div class="row">
            <div class="input-field column1">
                <input type="text" id="gross" name="gross" value="">
                <label for="title">Gross Salary</label>
                <span><?php echo $errgross ;?></span>
            </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit" name="submit" value="Submit">Submit</button>

    </form>

    <div>
        <?php
        view_teacher_list();
        ?>
    </div>


</div>
</body>
</html>