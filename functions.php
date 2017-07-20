<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/19/2017
 * Time: 10:33 PM
 */

/* Validate Functions*/
function validate_text($data){
    if (!preg_match("/^[a-zA-Z .]*$/",$data)) {
        return  "Only letters and white space allowed";
    }
}

function validate_number($data){
    if (!preg_match("/^[0-9.]*$/",$data)) {
        return  "Only numbers allowed";
    }
}

function validate_id($data){
    if (!preg_match("/^[0-9]*$/",$data)) {
        return  "Only numbers allowed";
    }

    require "connect.php";

    $sql="SELECT * FROM teacher WHERE t_id='$data'";

    if (mysqli_query($conn, $sql)) {
        $result=$conn->query($sql);
    } else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    if($result->num_rows>0){
        return "Teacher ID Exists";
    }

}

function validate_delete_id($data){
    if (!preg_match("/^[0-9]*$/",$data)) {
        return  "Only numbers allowed";
    }

    require "connect.php";

    $sql="SELECT * FROM teacher WHERE t_id='$data'";

    if (mysqli_query($conn, $sql)) {
        $result=$conn->query($sql);
    } else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    if($result->num_rows==0){
        return "Teacher ID Does Not Exists";
    }

}

/*Add Teacher*/

function add_teacher($id,$name,$account,$gross){
    require "connect.php";
    $sql = "INSERT INTO teacher (t_id,t_name,t_account,t_gross) VALUES ('$id','$name','$account','$gross')";

    if (mysqli_query($conn, $sql)) {
        echo "Teacher Added Successfully";
    } else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


/*Delete Teacher*/
function delete_teacher($id){
    require "connect.php";
    $sql = "DELETE FROM teacher WHERE t_id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Teacher Deleted Successfully";
    } else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


/*Construct Drop Down List With IDs From Teacher Table*/
function construct_id_select(){
    require "connect.php";
    $sql = "SELECT t_id,t_name FROM teacher ORDER BY t_id";
    $returnstring="";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $returnstring = $returnstring . " <option value=" . $row['t_id'] . ">" . $row['t_id'] . " - " . $row['t_name'] . "</option>";
    }
    echo $returnstring;
}


/*Construct Checkboxes With IDs From Teacher Table*/
function construct_id_select_welfare(){
    require "connect.php";
    $sql = "SELECT t_id,t_name FROM teacher ORDER BY t_id";
    $returnstring="";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $returnstring = $returnstring . " <input type='checkbox' name='ids[]' value=". $row['t_id']." checked >". $row['t_id']." - ". $row['t_name']."<br>";
    }
    echo $returnstring;
}

/*Add Data to Tables, If ID exist Update*/

function add_smi($id,$amount){
    require "connect.php";
    $sql = "INSERT INTO smi (teacher_t_id, smi_amount) VALUES ('$id','$amount')";
    $sql_update="UPDATE smi SET smi_amount='$amount' WHERE teacher_t_id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "SMI Deduct Added Successfully";
    }elseif (mysqli_errno($conn)==1062){
        if(mysqli_query($conn, $sql_update)){
            echo "SMI Deduct Updated Successfully";
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

function add_gurusetha($id,$amount){
    require "connect.php";
    $sql = "INSERT INTO gurusetha (teacher_t_id, guru_amount) VALUES ('$id','$amount')";
    $sql_update="UPDATE gurusetha SET guru_amount='$amount' WHERE teacher_t_id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Gurusetha Deduct Added Successfully";
    }elseif (mysqli_errno($conn)==1062){
        if(mysqli_query($conn, $sql_update)){
            echo "Gurusetha Deduct Updated Successfully";
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

function add_rdb($id,$amount){
    require "connect.php";
    $sql = "INSERT INTO rdb (teacher_t_id, rdb_amount) VALUES ('$id','$amount')";
    $sql_update="UPDATE rdb SET rdb_amount='$amount' WHERE teacher_t_id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "RDB Deduct Added Successfully";
    }elseif (mysqli_errno($conn)==1062){
        if(mysqli_query($conn, $sql_update)){
            echo "RDB Deduct Updated Successfully";
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


function add_stc($id,$amount){
    require "connect.php";
    $sql = "INSERT INTO stc (teacher_t_id, stc_amount) VALUES ('$id','$amount')";
    $sql_update="UPDATE stc SET stc_amount='$amount' WHERE teacher_t_id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "S.T.C. Deduct Added Successfully";
    }elseif (mysqli_errno($conn)==1062){
        if(mysqli_query($conn, $sql_update)){
            echo "S.T.C Deduct Updated Successfully";
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

function add_dinapala($id,$amount){
    require "connect.php";
    $sql = "INSERT INTO dinapala (teacher_t_id, dina_amount) VALUES ('$id','$amount')";
    $sql_update="UPDATE dinapala SET dina_amount='$amount' WHERE teacher_t_id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Dinapala Deduct Added Successfully";
    }elseif (mysqli_errno($conn)==1062){
        if(mysqli_query($conn, $sql_update)){
            echo "Dinapala Deduct Updated Successfully";
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

function add_welfare($ids,$amount){

    require "connect.php";

   foreach($ids as $id){
       $sql = "INSERT INTO welfare (teacher_t_id, wel_amount) VALUES ('$id','$amount')";
       $sql_update="UPDATE welfare SET wel_amount='$amount' WHERE teacher_t_id='$id'";

       if (mysqli_query($conn, $sql)) {
           echo "Welfare Deduct Added Successfully";
       }elseif (mysqli_errno($conn)==1062){
           if(mysqli_query($conn, $sql_update)){
               echo "Welfare Deduct Updated Successfully";
           }else{
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
           }
       }
       else {
           #header('Location:create_user_failed.php');
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
   }

}


/*View Functions for Each Table*/

function view_sim(){

    include "connect.php";
    $sql="SELECT teacher.t_id,teacher.t_name,smi.smi_amount FROM teacher INNER JOIN smi ON teacher.t_id = smi.teacher_t_id";

    echo "<table border='1'>";
    echo "<tr><td>ID</td><td>Name</td><td>Amount</td></tr>";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo "<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_name'] . "</td><td>" . $row['smi_amount'] . "</td></tr>";
    }
    echo "</table>";

}

function view_dinapala(){

    include "connect.php";
    $sql="SELECT teacher.t_id,teacher.t_name,dinapala.dina_amount FROM teacher INNER JOIN dinapala ON teacher.t_id = dinapala.teacher_t_id";

    echo "<table border='1'>";
    echo "<tr><td>ID</td><td>Name</td><td>Amount</td></tr>";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo "<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_name'] . "</td><td>" . $row['dina_amount'] . "</td></tr>";
    }
    echo "</table>";

}

function view_gurusetha(){

    include "connect.php";
    $sql="SELECT teacher.t_id,teacher.t_name,gurusetha.guru_amount FROM teacher INNER JOIN gurusetha ON teacher.t_id = gurusetha.teacher_t_id";

    echo "<table border='1'>";
    echo "<tr><td>ID</td><td>Name</td><td>Amount</td></tr>";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo "<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_name'] . "</td><td>" . $row['guru_amount'] . "</td></tr>";
    }
    echo "</table>";

}

function view_rdb(){

    include "connect.php";
    $sql="SELECT teacher.t_id,teacher.t_name,rdb.rdb_amount FROM teacher INNER JOIN rdb ON teacher.t_id = rdb.teacher_t_id";

    echo "<table border='1'>";
    echo "<tr><td>ID</td><td>Name</td><td>Amount</td></tr>";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo "<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_name'] . "</td><td>" . $row['rdb_amount'] . "</td></tr>";
    }
    echo "</table>";

}

function view_stc(){

    include "connect.php";
    $sql="SELECT teacher.t_id,teacher.t_name,stc.stc_amount FROM teacher INNER JOIN stc ON teacher.t_id = stc.teacher_t_id";

    echo "<table border='1'>";
    echo "<tr><td>ID</td><td>Name</td><td>Amount</td></tr>";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo "<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_name'] . "</td><td>" . $row['stc_amount'] . "</td></tr>";
    }
    echo "</table>";

}

function view_welfare(){

    include "connect.php";
    $sql="SELECT teacher.t_id,teacher.t_name,welfare.wel_amount FROM teacher INNER JOIN welfare ON teacher.t_id = welfare.teacher_t_id";

    echo "<table border='1'>";
    echo "<tr><td>ID</td><td>Name</td><td>Amount</td></tr>";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {
        #header('Location:create_user_failed.php');
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo "<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_name'] . "</td><td>" . $row['wel_amount'] . "</td></tr>";
    }
    echo "</table>";

}