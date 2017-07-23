<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/20/2017
 * Time: 6:39 PM
 */

require "connect.php";
require "functions.php";

$t_ids=$t_deduct="";
$errdeduct="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["deduct"])) {
        $errdeduct = "Deduct amount is required";
    } else {
        $t_deduct = mysqli_real_escape_string($conn, $_POST["deduct"]);
        $errdeduct = validate_number($t_deduct);
    }

    $t_ids=$_POST['ids'];
    if($errdeduct==""){
        add_welfare($t_ids,$t_deduct);
    }
}

?>
<html>
<body>

<div>
    <h2>Enter Welfare Deductions</h2>
</div>

<div>
    <form  class="col s12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <div class="row">
            <div class="input-field col s12">
                <label for="title">Deduct Amount</label>
                <input type="text" id="deduct" name="deduct" value="">

                <span><?php echo $errdeduct ;?></span>
            </div>
        </div>
        <div><hr></div>
        <div class="row">
            <div class="input-field col s12">
                <?php

                construct_id_select_checkbox()
                ?>
            </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit" name="submit" value="Submit">Submit
    </form>
</div>
<div>
    <?php
    view_welfare()
    ?>
</div>


</body>
</html>