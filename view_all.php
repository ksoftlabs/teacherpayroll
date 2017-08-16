<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/20/2017
 * Time: 8:33 PM
 */
include "functions.php";
include "access_control.php";
include "header.php";
?>
<div class='column6'>
    <div>
        <h2>Pay Sheet</h2>
    </div>
<?php
calculate_deduct_and_net();
view_all();
?>
</div>
<?php
include "footer.php";
?>