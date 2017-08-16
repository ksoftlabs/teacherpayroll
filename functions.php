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

function validate_text_and_numbers($data){
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$data)) {
        return  "Only letters and numbers allowed";
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

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    if($result->num_rows==0){
        return "Teacher ID Does Not Exists";
    }

}

function validate_username($data){
    if (!preg_match("/^[a-zA-Z0-9]*$/",$data)) {
        return  "Only letters and numbers allowed";
    }

    require "connect.php";

    $sql="SELECT * FROM users WHERE user_username='$data'";

    if (mysqli_query($conn, $sql)) {
        $result=$conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    if($result->num_rows>0){
        return "Username Already Exists";
    }

}

/*Add Teacher*/

function add_teacher($id,$name,$account,$gross){
    require "connect.php";
    $sql = "INSERT INTO teacher (t_id,t_name,t_account,t_gross) VALUES ('$id','$name','$account','$gross')";

    if (mysqli_query($conn, $sql)) {
        echo "Teacher Added Successfully";
    } else {

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

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $returnstring = $returnstring . " <option value=" . $row['t_id'] . ">" . $row['t_id'] . " - " . $row['t_name'] . "</option>";
    }
    echo $returnstring;
}


/*Construct Checkboxes With IDs From Teacher Table*/
function construct_id_select_checkbox(){
    require "connect.php";
    $sql = "SELECT t_id,t_name FROM teacher ORDER BY t_id";
    $returnstring="";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $returnstring = $returnstring . " <input type='checkbox' name='ids[]' value=". $row['t_id']." checked >". $row['t_id']." - ". $row['t_name']."<br>";
    }
    echo $returnstring;
}

/*Construct Checkboxes With IDs From Teacher Table*/
function construct_id_select_checkbox_unchecked(){
    require "connect.php";
    $sql = "SELECT t_id,t_name FROM teacher ORDER BY t_id";
    $returnstring="";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $returnstring = $returnstring . " <input type='checkbox' name='ids[]' value=". $row['t_id'].">". $row['t_id']." - ". $row['t_name']."<br>";
    }
    echo $returnstring;
}

/*Construct Checkboxes With IDs From User Table*/
function construct_user_select_checkbox_unchecked(){
    require "connect.php";
    $sql = "SELECT user_id,user_name,user_username FROM users ORDER BY user_id";
    $returnstring="";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $returnstring = $returnstring . " <input type='checkbox' name='ids[]' value=". $row['user_id'].">". $row['user_username']." - ". $row['user_name']."<br>";
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

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo "<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_name'] . "</td><td>" . $row['wel_amount'] . "</td></tr>";
    }
    echo "</table>";

}

function view_all(){
    include "connect.php";
    $sql="SELECT teacher.*,COALESCE(welfare.wel_amount,0) AS wel_amount ,COALESCE(smi.smi_amount,0) AS smi_amount ,COALESCE(gurusetha.guru_amount,0) AS guru_amount,COALESCE(rdb.rdb_amount,0) AS rdb_amount,COALESCE(stc.stc_amount,0) AS stc_amount,COALESCE(dinapala.dina_amount,0) AS dina_amount FROM teacher LEFT OUTER JOIN welfare ON teacher.t_id=welfare.teacher_t_id LEFT OUTER JOIN smi ON teacher.t_id=smi.teacher_t_id LEFT OUTER JOIN gurusetha ON teacher.t_id=gurusetha.teacher_t_id LEFT OUTER JOIN rdb ON teacher.t_id=rdb.teacher_t_id LEFT OUTER JOIN stc ON teacher.t_id=stc.teacher_t_id LEFT OUTER JOIN dinapala ON teacher.t_id=dinapala.teacher_t_id";

    echo "<table border='1'>";

    echo "<tr><td>ID</td><td>Name</td><td>Gross Salary</td><td>Welfare</td><td>SMI Bank</td><td>Gurusetha</td><td>RDB</td><td>S.T.C</td><td>Dinapala</td><td>Total Deduct</td><td>Net Salary</td></tr>";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo "<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_name'] . "</td><td>" . $row['t_gross'] . "</td><td>". $row['wel_amount'] . "</td><td>". $row['smi_amount'] . "</td><td>". $row['guru_amount'] . "</td><td>". $row['rdb_amount'] . "</td><td>". $row['stc_amount'] . "</td><td>". $row['dina_amount'] . "</td><td>". $row['t_deduct'] . "</td><td>". $row['t_net'] . "</td></tr>";
    }

    echo "</table>";
}

function calculate_deduct_and_net(){
    include "connect.php";
    $t_id="";
    $total_deduct=$net_salary=$gross=$dinapala=$gurusetha=$rdb=$smi=$stc=$welfare=0;

    $sql_get_data="SELECT teacher.*,COALESCE(welfare.wel_amount,0) AS wel_amount ,COALESCE(smi.smi_amount,0) AS smi_amount ,COALESCE(gurusetha.guru_amount,0) AS guru_amount,COALESCE(rdb.rdb_amount,0) AS rdb_amount,COALESCE(stc.stc_amount,0) AS stc_amount,COALESCE(dinapala.dina_amount,0) AS dina_amount FROM teacher LEFT OUTER JOIN welfare ON teacher.t_id=welfare.teacher_t_id LEFT OUTER JOIN smi ON teacher.t_id=smi.teacher_t_id LEFT OUTER JOIN gurusetha ON teacher.t_id=gurusetha.teacher_t_id LEFT OUTER JOIN rdb ON teacher.t_id=rdb.teacher_t_id LEFT OUTER JOIN stc ON teacher.t_id=stc.teacher_t_id LEFT OUTER JOIN dinapala ON teacher.t_id=dinapala.teacher_t_id";


    if (mysqli_query($conn,$sql_get_data)) {
        $result = $conn->query($sql_get_data);
    } else {

        echo "Error: " . $sql_get_data . "<br>" . mysqli_error($conn);
    }

  while ($row = $result->fetch_array(MYSQLI_ASSOC)){


        $t_id=$row['t_id'];
        $gross=$row['t_gross'];
        $welfare=$row['wel_amount'];
        $smi=$row['smi_amount'];
        $gurusetha=$row['guru_amount'];
        $rdb=$row['rdb_amount'];
        $stc=$row['stc_amount'];
        $dinapala=$row['dina_amount'];

        $total_deduct=$welfare+$smi+$gurusetha+$rdb+$stc+$dinapala;
        $net_salary=$gross-$total_deduct;


      $sql_update="UPDATE teacher SET t_deduct=$total_deduct,t_net=$net_salary WHERE t_id=$t_id";

        if (mysqli_query($conn, $sql_update)) {
        } else {

            echo "Error: " . $sql_get_data . "<br>" . mysqli_error($conn);
        }

    }


}


function view_teacher_list(){
    require "connect.php";

    $sql = "SELECT * FROM teacher ORDER BY t_id";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    echo "<table border='1'>";
    echo "<tr><td>ID</td><td>Name</td><td>Account Number</td><td>Gross Salary</td><td>Total Deduct</td><td>Net Salary</td></tr>";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo "<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_name'] . "</td><td>" . $row['t_account'] . "</td><td>" . $row['t_gross'] . "</td><td>" . $row['t_deduct'] . "</td><td>" . $row['t_net'] . "</td></tr>";
    }
    echo "</table>";
}


function edit_teacher($id,$name,$account,$gross){
    include "connect.php";

    $sql_update_name="UPDATE teacher SET t_name='$name' WHERE t_id=$id";
    $sql_update_account="UPDATE teacher SET t_account=$account WHERE t_id=$id";
    $sql_update_gross="UPDATE teacher SET t_gross=$gross WHERE t_id=$id";

    if($name!=""){
        if (mysqli_query($conn, $sql_update_name)) {
            $result = $conn->query($sql_update_name);
        } else {

            echo "Error: " . $sql_update_name . "<br>" . mysqli_error($conn);
        }
    }

    if($account!=""){
        if (mysqli_query($conn, $sql_update_account)) {
            $result = $conn->query($sql_update_account);
        } else {

            echo "Error: " . $sql_update_account . "<br>" . mysqli_error($conn);
        }
    }

    if($gross!=""){
        if (mysqli_query($conn, $sql_update_gross)) {
            $result = $conn->query($sql_update_gross);
        } else {

            echo "Error: " . $sql_update_gross . "<br>" . mysqli_error($conn);
        }
    }
}

function edit_id($id,$newid){
    include "connect.php";
    $sql="UPDATE teacher SET t_id=$newid WHERE t_id=$id";
    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


}


function approve_users($ids){
    require "connect.php";
/*
    $sql_reset = "UPDATE users SET user_approved=0";

    if (mysqli_query($conn, $sql_reset)) {
        $result = $conn->query($sql_reset);
    } else {

        echo "Error: " . $sql_reset . "<br>" . mysqli_error($conn);
    }*/

    foreach($ids as $id){

        $sql_update="UPDATE users SET user_approved=1 WHERE user_id='$id'";

        if (mysqli_query($conn, $sql_update)) {
            $result = $conn->query($sql_update);
        } else {

            echo "Error: " . $sql_update . "<br>" . mysqli_error($conn);
        }

    }
}



function view_teachers(){

    include "connect.php";
    $sql="SELECT t_id,t_name,t_net FROM teacher";

    echo "<table border='1'>";
    echo "<tr><td>ID</td><td>Name</td><td>Amount</td></tr>";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo "<tr><td>" . $row['t_id'] . "</td><td>" . $row['t_name'] . "</td><td>" . $row['t_net'] . "</td></tr>";
    }
    echo "</table>";

}

function view_users(){

    include "connect.php";
    $sql="SELECT user_id,user_name,user_approved FROM users";

    echo "<table border='1'>";
    echo "<tr><td>ID</td><td>Name</td><td>Approved</td></tr>";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo "<tr><td>" . $row['user_id'] . "</td><td>" . $row['user_name'] . "</td><td>" . $row['user_approved'] . "</td></tr>";
    }
    echo "</table>";

}

function create_user($name,$u_username,$password){
    include "connect.php";
    $hash=password_hash($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (user_name,user_username,user_pass,user_type) VALUES ('$name','$u_username','$password',2)";

    if (mysqli_query($conn, $sql)) {
        echo "User Added Successfully";
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


}



function calculate_welfare_total(){
    require "connect.php";
    $welfare_total=0;

    $sql="SELECT wel_amount FROM welfare";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $welfare_total+=$row['wel_amount'];
    }

    return $welfare_total;
}

function calculate_smi_total(){
    require "connect.php";
    $smi_total=0;

    $sql="SELECT smi_amount FROM smi";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $smi_total+=$row['smi_amount'];
    }

    return $smi_total;
}

function calculate_guru_total(){
    require "connect.php";
    $guru_total=0;

    $sql="SELECT guru_amount FROM gurusetha";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $guru_total+=$row['guru_amount'];
    }

    return $guru_total;
}

function calculate_rdb_total(){
    require "connect.php";
    $rdb_total=0;

    $sql="SELECT rdb_amount FROM rdb";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $rdb_total+=$row['rdb_amount'];
    }

    return $rdb_total;
}

function calculate_stc_total(){
    require "connect.php";
    $stc_total=0;

    $sql="SELECT stc_amount FROM stc";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $stc_total+=$row['stc_amount'];
    }

    return $stc_total;
}

function calculate_dina_total(){
    require "connect.php";
    $dina_total=0;

    $sql="SELECT dina_amount FROM dinapala";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $dina_total+=$row['dina_amount'];
    }

    return $dina_total;
}

function calculate_boc_total(){
    require "connect.php";
    $boc_total=0;

    $sql="SELECT t_net FROM teacher";

    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $boc_total+=$row['t_net'];
    }

    return $boc_total;
}


function user_login($u_user,$pass){
    require "connect.php";
    //$hashed=password_hash($pass,PASSWORD_DEFAULT);

    $sql="SELECT * FROM users WHERE user_name='$u_user' AND user_pass='$pass' AND user_approved=1";

    if (mysqli_query($conn, $sql)) {
        $result=$conn->query($sql);
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    if($result->num_rows==0){
        echo "Invalid Username/Password";
    } else{
        echo "User Logged In";
        $row = $result->fetch_array(MYSQLI_ASSOC);
        session_start();
        $_SESSION['userid']=$row['user_id'];
        $_SESSION['usertype']=$row['user_type'];
        header("location:index.php");
    }

}