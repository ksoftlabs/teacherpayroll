<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 8/16/2017
 * Time: 6:51 AM
 *
 * This file is part of EasyPay Teacher Payroll System
 *
 * EasyPay Teacher Payroll System is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 *
 * EasyPay Teacher Payroll System  is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 */

session_start();
if(!isset($_SESSION['usertype'])){
    $_SESSION['usertype']=0;
}


if($_SESSION['usertype']!=1){
    echo "<html><head><link href=\"style.css\" rel=\"stylesheet\"></head><body><div class='column2center text-center' ><h2>Access Denied. </h2><h2>Admin Access Required.</h2>Click <a href='login.php'>here</a> to log in</div></body></html>";
    die();
}
?>