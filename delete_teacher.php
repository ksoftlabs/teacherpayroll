<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/20/2017
 * Time: 12:11 AM
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
include "access_control.php";
include "header.php";

$t_id1=$t_id2="";
$errid="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["id1"]==$_POST["id2"]) {
        if (empty($_POST["id1"])) {
            $errid = "ID is required";
        } else {
            $t_id1 = mysqli_real_escape_string($conn, $_POST["id1"]);
            $errid = validate_delete_id($t_id1);
        }

        if (empty($_POST["id2"])) {
            $errid = "ID is required";
        } else {
            $t_id2 = mysqli_real_escape_string($conn, $_POST["id1"]);
            $errid = validate_delete_id($t_id2);
        }

        if ($errid == "") {
            delete_teacher($t_id1);
        }
    }else{
        $errid="IDs Does Not Match";
    }
}
?>

<div class="column6">
    <div class="row"><h2>Delete A Teacher</h2></div>

    <form  class="column1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
            <div class="column1">
                <label for="name">ID</label>
                <input id="id1" name="id1" type="text" value="<?php echo $t_id1;?>">

                <span><?php echo $errid ?></span>
            </div>
        </div>
        <div class="row">
            <div class="column1">
                <label for="name">Confirm ID</label>
                <input id="id2" name="id2" type="text" value="<?php echo $t_id2;?>">

            </div>
        </div>
        <button class="btn" type="submit" name="submit" value="Submit">Delete</button>

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

