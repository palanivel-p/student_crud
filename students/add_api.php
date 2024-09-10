<?php 
 include('../includes/connection.php');

 if(isset($_POST['student_name'])&& isset($_POST['student_email'])){
   $student_name = $_POST['student_name'];
   $student_email = $_POST['student_email'];
   $student_mobile = $_POST['student_mobile'];
   $address = $_POST['address'];
   $sql = "INSERT INTO `student` (`student_id`,`student_name`,`student_email`,`student_mobile`,`address`)value('','$student_name','$student_email','$student_mobile','$address')";
    mysqli_query($conn,$sql); 
   
    $ID = mysqli_insert_id($conn);
    if(strlen($ID)==1){ 
        $ID = '00'.$ID;
    }
    else if(strlen($ID) >1){
        $ID = '0'.$ID;
    }
    $student_id = 'ST'.$ID;
    $sqlUpdate = "UPDATE `student` SET `student_id`='$student_id' WHERE id = '$ID'";
    mysqli_query($conn,$sqlUpdate);

    $json_array['status'] = 'Success';
    $json_array['msg'] = 'Student Add Successfully';
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