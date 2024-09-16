<?php
include("../includes/connection.php");

if (isset($_POST['email_field']) && isset($_POST['pwd_field'])) {


    $email_field = $_POST['email_field'];
    $pwd_field = $_POST['pwd_field'];


    $sqlValidateEmail = "SELECT * FROM `user` WHERE email='$email_field' AND password='$pwd_field'";

    $resValidateEmail = mysqli_query($conn, $sqlValidateEmail);
    if (mysqli_num_rows($resValidateEmail) > 0) {



        $row = mysqli_fetch_assoc($resValidateEmail);


        setcookie("userId", $row['id'], time() + (86400 * 30), "/");

        $json_array['status'] = "success";
        $json_array['msg'] = "Welcome  " . $row['user_name'] . "!!!";
        $json_response = json_encode($json_array);
        echo $json_response;

        //log



    } else {
        //Parameters missing
        $json_array['status'] = "failure";
        $json_array['msg'] = "Email or Password is Incorrect !!!";
        $json_response = json_encode($json_array);
        echo $json_response;
    }
} else {
    //Parameters missing
    $json_array['status'] = "failure";
    $json_array['msg'] = "Please try after Sometime !!!";
    $json_response = json_encode($json_array);
    echo $json_response;
}