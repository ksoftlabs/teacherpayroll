<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/24/2017
 * Time: 12:41 AM
 */
require "connect.php";
require "functions.php";

$t_ids="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["ids"])) {

    } else {
        $t_ids=$_POST['ids'];
        add_cheque($t_ids);
    }
}

?>
<html>
<body>

<div>
    <h2>Enter Pay By Cheques</h2>
</div>

<div>
    <form  class="col s12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <div><hr></div>
        <div class="row">
            <div class="input-field col s12">
                <?php

                construct_id_select_checkbox_unchecked();
                ?>
            </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit" name="submit" value="Submit">Submit
    </form>
</div>
<div>
    <?php
    view_cheque_teachers();
    ?>
</div>


</body>
</html>