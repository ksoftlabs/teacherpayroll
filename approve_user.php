<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/25/2017
 * Time: 6:48 PM
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
include "access_control_admin.php";
include "header.php";

$user_ids="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["ids"])) {

    } else {
        $user_ids=$_POST['ids'];
        approve_users($user_ids);
    }
}

?>

<div class="column6">

<div>
    <h2>Approve Users</h2>
</div>

<div>
    <form  class="column1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <div><hr></div>
        <div class="row">
            <div class="column1">
                <?php

                construct_user_select_checkbox_unchecked();
                ?>
            </div>
        </div>

        <button class="btn" type="submit" name="submit" value="Submit">Submit
    </form>
</div>
<div>
    <?php
    view_users();
    ?>
</div>


</div>
<?php
include "footer.php";
?>