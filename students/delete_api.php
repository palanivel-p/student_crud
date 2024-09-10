<?php
include('../includes/connection.php');

if(isset($_POST['student_id'])){
    $student_id = $_POST['student_id'];

    $sql = "DELETE FROM `student` WHERE student_id = '$student_id'";
    mysqli_query($conn,$sql);

    $json_array['status'] = 'Success';
    $json_array['msg'] = 'Deleted Successfully';
    $json_responce =json_encode($json_array);
    echo $json_responce;
}
else{
    $json_array['status'] = 'Failure';
    $json_array['msg'] = 'Parameter Missing';
    $json_responce =json_encode($json_array);
    echo $json_responce;
}
?>