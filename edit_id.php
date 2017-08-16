<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/22/2017
 * Time: 1:09 AM
 */

require "connect.php";
require "functions.php";
include "access_control.php";
include "header.php";

$t_id=$t_new_id="";
$errnewid="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {

    } else {
        $t_id=$_POST["id"];
    }

    if (empty($_POST["new_id"])) {
        $errnewid = "New ID is required";
    } else {
        $t_new_id = mysqli_real_escape_string($conn,$_POST["new_id"]);
        $errnewid = validate_id($t_new_id);
    }

    if($errnewid==""){
        edit_id($t_id,$t_new_id);
    }

}
?>


<div class="column6">
    <div class="row"><h2>Edit A Teacher ID</h2></div>

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
                <label for="email">New ID</label>
                <input type="text" name="new_id" id="new_id" value="">

                <span><?php echo $errnewid ?></span>
            </div>
        </div>

        <button class="btn" type="submit" name="submit" value="Submit">Submit</button>

    </form>

    <div>
        <?php
        view_teacher_list();
        ?>
    </div>


</div>
<?php
include "footer.php";
?>