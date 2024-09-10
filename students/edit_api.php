<?php 
 include('../includes/connection.php');

 if(isset($_POST['student_id'])&& isset($_POST['student_email'])){
   $student_id = $_POST['student_id'];
   $student_name = $_POST['student_name'];
   $student_email = $_POST['student_email'];
   $student_mobile = $_POST['student_mobile'];
   $address = $_POST['address'];
   $sqlUpdate = "UPDATE `student` SET `student_id`='$student_id',`student_name`='$student_name',`student_email`='$student_email',`student_mobile`='$student_mobile',`address`='$address' WHERE student_id = '$student_id'";
    mysqli_query($conn,$sqlUpdate);


    $json_array['status'] = 'Success';
    $json_array['msg'] = 'Student Updated Successfully';
    $json_responce = json_encode($json_array);
    echo $json_responce;
}
 else{
    $json_array['status'] = 'Failure';
    $json_array['msg'] = 'Parameter Missing';
    $json_responce = json_encode($json_array);
    echo $json_responce;
 }
 function clean($data) {
    return filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}
?>