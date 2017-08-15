<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 8/8/2017
 * Time: 11:04 AM
 */

require "connect.php";
require "functions.php";

$page1=$page2="";
$errpage1=$errpage2="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["page1"])) {
        $errpage1 = "Page 1 Total is required";
    } else {
        $page1 = mysqli_real_escape_string($conn,$_POST["page1"]);
        $errpage1 = validate_number($page1);
    }

    if (empty($_POST["page2"])) {
        $errpage2 = "Page 2 Total is required";
    } else {
        $page2 = mysqli_real_escape_string($conn,$_POST["page2"]);
        $errpage2 = validate_number($page2);
    }


    if($errpage1==""and $errpage2==""){
        add_page_totals($page1,$page2);
    }

}
?>


<html>

<body>
<div class="container">
    <div class="row"><h2>Add Page Totals</h2></div>

    <form  class="column1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
            <div class="input-field column1">
                <input id="page1" name="page1" type="text" value="<?php echo $page1;?>">
                <label for="page1">Page 1 Total</label>
                <span><?php echo $errpage1 ?></span>
            </div>
        </div>

        <div class="row">
            <div class="input-field column1">
                <input type="text" name="page2" id="page2" value="<?php echo $page2;?>">
                <label for="page2">Page 2 Total</label>
                <span><?php echo $errpage2 ?></span>
            </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit" name="submit" value="Submit">Submit</button>
    </form>


</div>
</body>
</html>