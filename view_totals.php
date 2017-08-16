<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/24/2017
 * Time: 10:05 AM
 */

require "functions.php";
include "access_control.php";
include "header.php";
echo "<div class='column6'>";
calculate_deduct_and_net();
calculate_dina_total();
calculate_guru_total();
calculate_rdb_total();
calculate_smi_total();
calculate_stc_total();
calculate_welfare_total();
?>
</div>
</body>
</html>
