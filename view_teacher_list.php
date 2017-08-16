<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/20/2017
 * Time: 12:28 AM
 */

include "functions.php";
include "access_control.php";
include "header.php";

?>
<div class='column6'>
    <div>
        <h2>List of Teachers</h2>
    </div>
    <?php
view_teacher_list();
?>
</div>
<?php
include "footer.php";
?>