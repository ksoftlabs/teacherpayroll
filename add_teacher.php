<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/19/2017
 * Time: 10:22 PM
 *
 * This file is part of EasyPay Teacher Payroll System
 *
 * EasyPay Teacher Payroll System is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 *
 * EasyPay Teacher Payroll System  is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 */
require "connect.php";
require "functions.php";
require "access_control.php";
include "header.php";

$t_id=$t_name=$t_account=$t_gross="";
$errid=$errname=$erraccount=$errgross="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {
        $errid = "ID is required";
    } else {
        $t_id = mysqli_real_escape_string($conn,$_POST["id"]);
        $errid = validate_id($t_id);
    }

    if (empty($_POST["name"])) {
        $errname = "Name is required";
    } else {
        $t_name = mysqli_real_escape_string($conn,$_POST["name"]);
        $errname = validate_text($t_name);
    }

    if (empty($_POST["account"])) {
        #$errname = "Account is required";
    } else {
        $t_account = mysqli_real_escape_string($conn,$_POST["account"]);
        $erraccount = validate_number($t_account);
    }

    if (empty($_POST["gross"])) {
        $errgross = "Gross Salary is required";
    } else {
        $t_gross = mysqli_real_escape_string($conn,$_POST["gross"]);
        $errgross = validate_number($t_gross);
    }

    if($errid==""and $errname=="" and $erraccount==""and $errgross==""){
        add_teacher($t_id,$t_name,$t_account,$t_gross);
        $t_id=$t_name=$t_account=$t_gross="";
    }

}
?>


<div class="column6">
    <div class="row"><h2>Add A Teacher</h2></div>

    <form  class="column1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
            <div class="input-field column1">
                <label for="name">ID</label>
                <input id="id" name="id" type="text" value="<?php echo $t_id;?>">

                <span><?php echo $errid ?></span>
            </div>
        </div>

        <div class="row">
            <div class="input-field column1">

                <label for="email">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $t_name;?>">
                <span><?php echo $errname ?></span>
            </div>
        </div>

        <div class="row">
            <div class="column1">
                <label for="contact">Account Number</label>
                <input type="text" id="account" name="account" value="<?php echo $t_account;?>">

                <span><?php echo $erraccount ?></span>
            </div>
        </div>

        <div class="row">
            <div class="column1">

                <label for="title">Gross Salary</label>
                <input type="text" id="gross" name="gross" value="<?php echo $t_gross;?>">
                <span><?php echo $errgross ;?></span>
            </div>
        </div>

        <button class="btn" type="submit" name="submit" value="Submit">Submit</button>

        <div>
            <?php
            view_teacher_list();
            ?>
        </div>
    </form>


</div>
<?php
include "footer.php";
?>

