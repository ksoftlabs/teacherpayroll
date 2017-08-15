<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/25/2017
 * Time: 6:48 PM
 */
require "connect.php";
require "functions.php";

$user_ids="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["ids"])) {

    } else {
        $user_ids=$_POST['ids'];
        approve_users($user_ids);
    }
}

?>
<html>
<body>

<div>
    <h2>Approve Users</h2>
</div>

<div>
    <form  class="column1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <div><hr></div>
        <div class="row">
            <div class="input-field column1">
                <?php

                construct_user_select_checkbox_unchecked();
                ?>
            </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit" name="submit" value="Submit">Submit
    </form>
</div>
<div>
    <?php
    view_users();
    ?>
</div>


</body>
</html>