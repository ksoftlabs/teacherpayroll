<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 8/13/2017
 * Time: 7:26 PM
 *
 * This file is part of EasyPay Teacher Payroll System
 *
 * EasyPay Teacher Payroll System is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 *
 * EasyPay Teacher Payroll System  is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 */

?>
<html>
<head>
    <title>Easy Pay</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="column1 addborder topbar">
    <h2 class="text-center">Easy Pay</h2>
</div>
<div class="row">
<div class="column5">
<ul class="addborder">
    <li><a class="label">Operations</a></li>
    <li><a href="add_teacher.php">Add Teacher</a></li>
    <li><a href="delete_teacher.php">Delete Teacher</a></li>
    <li><a href="edit_teacher.php">Edit Teacher</a></li>
    <li><a href="edit_id.php">Edit Teacher ID</a></li>
    <li><a class="label">Deductions</a></li>
    <li><a href="add_dinapala.php">Dinapala</a></li>
    <li><a href="add_gurusetha.php">Gurusetha</a></li>
    <li><a href="add_rdb.php">RDB</a></li>
    <li><a href="add_smi.php">SMI</a></li>
    <li><a href="add_stc.php">STC</a></li>
    <li><a href="add_welfare.php">Welfare</a></li>
    <li><a class="label">View</a></li>
    <li><a href="view_all.php">View All</a></li>
    <li><a href="view_teacher_list.php">View Teacher List</a></li>
    <li><a href="view_totals.php">View Deduction Totals</a></li>
    <?php
    if($_SESSION['usertype']==1){
        echo "<li><a class='label'>Admin</a></li>";
        echo "<li><a href='approve_user.php'>Approve User</a></li>";
    };
    ?>
    <li><a class="label" href="logout.php">Log Out</a></li>
</ul>
</div>

