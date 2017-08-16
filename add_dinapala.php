<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/20/2017
 * Time: 6:37 PM
 */

require "connect.php";
require "functions.php";
include "access_control.php";
include "header.php";




$t_id=$t_deduct="";
$errdeduct="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["deduct"])) {
        $errdeduct = "Deduct amount is required";
    } else {
        $t_deduct = mysqli_real_escape_string($conn, $_POST["deduct"]);
        $errdeduct = validate_number($t_deduct);
    }

    if (!empty($_POST["id"])) {
        $t_id=$_POST["id"];
    }



    if($errdeduct=="" and $t_id!=""){
        add_dinapala($t_id,$t_deduct);
    }
}

?>

<div class="column6">

<div>
    <h2>Enter Dinapala Deductions</h2>
</div>

<div>
    <form  class="column1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
            <div class="column1">
                <label for="id">Select ID</label>
                <select name="id" id="id">
                    <?php
                    construct_id_select();
                    ?>
                </select>
            </div>
        </div>



        <div class="row">
            <div class="column1">
                <label for="title">Deduct Amount</label>
                <input type="text" id="deduct" name="deduct" value="">

                <span><?php echo $errdeduct ;?></span>
            </div>
        </div>

        <button class="btn" type="submit" name="submit" value="Submit">Submit
    </form>
</div>
<div>
    <?php
    view_dinapala()
    ?>
</div>

</div>
<?php
include "footer.php";
?>