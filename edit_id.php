<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/22/2017
 * Time: 1:09 AM
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

$t_id=$t_new_id="";
$errnewid="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {

    } else {
        $t_id=$_POST["id"];
    }

    if (empty($_POST["new_id"])) {
        $errnewid = "New ID is required";
    } else {
        $t_new_id = mysqli_real_escape_string($conn,$_POST["new_id"]);
        $errnewid = validate_id($t_new_id);
    }

    if($errnewid==""){
        edit_id($t_id,$t_new_id);
    }

}
?>


<div class="column6">
    <div class="row"><h2>Edit A Teacher ID</h2></div>

    <form  class="column1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
            <div class="column1">
                <label for="id">Select ID</label>
                <select name="id" id="id">
                    <?php
                    construct_id_select();
                    ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="column1">
                <label for="email">New ID</label>
                <input type="text" name="new_id" id="new_id" value="">

                <span><?php echo $errnewid ?></span>
            </div>
        </div>

        <button class="btn" type="submit" name="submit" value="Submit">Submit</button>

    </form>

    <div>
        <?php
        view_teacher_list();
        ?>
    </div>


</div>
<?php
include "footer.php";
?>