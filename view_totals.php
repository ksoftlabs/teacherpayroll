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
echo "<p>Total Deduction for Dinapala : Rs ";
echo calculate_dina_total();
echo "<p>Total Deduction for Gurusetha : Rs ";
echo calculate_guru_total();
echo "<p>Total Deduction for RDB : Rs ";
echo calculate_rdb_total();
echo "<p>Total Deduction for SMI : Rs ";
echo calculate_smi_total();
echo "<p>Total Deduction for STC : Rs ";
echo calculate_stc_total();
echo "<p>Total Deduction for Welfare : Rs ";
echo calculate_welfare_total();
?>
</div>
<?php
include "footer.php";
?>
