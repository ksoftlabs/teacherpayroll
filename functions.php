<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 7/19/2017
 * Time: 10:33 PM
 */

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

