<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/24/2017
 * Time: 10:05 AM
 *
 * This file is part of EasyPay Teacher Payroll System
 *
 * EasyPay Teacher Payroll System is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 *
 * EasyPay Teacher Payroll System  is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
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
