<?php 
include('../includes/connection.php');

// if(isset($_POST['student_id'])){

    $student_id = $_POST['student_id'];

    $sql = "SELECT * FROM `student` WHERE student_id = '$student_id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    
    $student_id = $row['student_id'];
    $student_name = $row['student_name'];
    $student_email = $row['student_email'];
    $student_mobile = $row['student_mobile'];
    $address = $row['address'];

    $json_array['status'] = 'Success';
    $json_array['student_id'] = $student_id;
    $json_array['student_name'] = $student_name;
    $json_array['student_email'] = $student_email;
    $json_array['student_mobile'] = $student_mobile;
    $json_array['address'] = $address;
    $json_responce = json_encode($json_array);
    echo $json_responce;

// }
// else{
//     $json_array['status'] = 'Failure';
//     $json_array['msg'] = 'Parameter missing';
//     $json_responce  = json_encode($json_array);
//     echo $json_responce;
// }
?>