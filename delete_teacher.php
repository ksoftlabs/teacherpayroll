<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/20/2017
 * Time: 12:11 AM
 */

require "connect.php";
require "functions.php";
include "access_control.php";
include "header.php";

$t_id1=$t_id2="";
$errid="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["id1"]==$_POST["id2"]) {
        if (empty($_POST["id1"])) {
            $errid = "ID is required";
        } else {
            $t_id1 = mysqli_real_escape_string($conn, $_POST["id1"]);
            $errid = validate_delete_id($t_id1);
        }

        if (empty($_POST["id2"])) {
            $errid = "ID is required";
        } else {
            $t_id2 = mysqli_real_escape_string($conn, $_POST["id1"]);
            $errid = validate_delete_id($t_id2);
        }

        if ($errid == "") {
            delete_teacher($t_id1);
        }
    }else{
        $errid="IDs Does Not Match";
    }
}
?>

<div class="column6">
    <div class="row"><h2>Delete A Teacher</h2></div>

    <form  class="column1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
            <div class="input-field column1">
                <input id="id1" name="id1" type="text" value="<?php echo $t_id1;?>">
                <label for="name">ID</label>
                <span><?php echo $errid ?></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field column1">
                <input id="id2" name="id2" type="text" value="<?php echo $t_id2;?>">
                <label for="name">Confirm ID</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="submit" value="Submit">Delete</button>

        <div>
            <?php
            view_teacher_list();
            ?>
        </div>
    </form>


</div>
</body>
</html>

