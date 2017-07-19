<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/20/2017
 * Time: 12:28 AM
 */

require "connect.php";

$sql = "SELECT * FROM teacher ORDER BY t_id";

if (mysqli_query($conn, $sql)) {
    $result = $conn->query($sql);
} else {
    #header('Location:create_user_failed.php');
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo "<html><body><table border='1'>";

echo "<tr><td>ID</td><td>Name</td><td>Account Number</td><td>Gross Salary</td><td>Total Deduct</td><td>Net Salary</td>";

while ($row = $result->fetch_array(MYSQLI_ASSOC)){
    echo "<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_name'] . "</td><td>" . $row['t_account'] . "</td><td>" . $row['t_gross'] . "</td><td>" . $row['t_deduct'] . "</td><td>" . $row['t_net'] . "</td></tr>";
}
echo "</html></body></table>";