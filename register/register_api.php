<?php
// Include("http://localhost/logic_crud/includes/connection.php");

// header('Content-Type: application/json');

// if (isset($_POST['email']) && isset($_POST['password'])) {
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     // Check if email is already registered
//     $sqlValidateEmail = "SELECT * FROM user WHERE user_name='$email'";
//     $result = mysqli_query($conn, $sqlValidateEmail);

//     if (mysqli_num_rows($result) == 0) {
//         // Insert new user
//         $hashed_password = password_hash($password, PASSWORD_DEFAULT);
//         $sql = "INSERT INTO user (user_name, password) VALUES ('$email', '$hashed_password')";
//         if (mysqli_query($conn, $sql)) {
//             echo json_encode(["status" => "success", "msg" => "Registered successfully!"]);
//         } else {
//             echo json_encode(["status" => "error", "msg" => "Failed to register. Try again!"]);
//         }
//     } else {
//         echo json_encode(["status" => "error", "msg" => "Email is already registered!"]);
//     }
// } else {
//     echo json_encode(["status" => "error", "msg" => "Invalid request."]);
// }
?>
<?php
Include("../includes/connection.php");

if(isset($_POST['email_field']) && isset($_POST['pwd_field'])&& isset($_POST['username'])) {

    $user_name = clean($_POST['username']);
    $email = clean($_POST['email_field']);
    $password = clean($_POST['pwd_field']);

//    $salt = 'GB#$20deeSp%22';
//      $pw_hash = sha1($salt.$password);
    // $remember = 0;

    $sqlValidate = "SELECT * FROM `user` WHERE email='$email' AND password='$password'";
    $resValidate = mysqli_query($conn, $sqlValidate);
    if (mysqli_num_rows($resValidate) == 0) {

        $sql = "INSERT INTO user (`user_name`, `email`,`password`) VALUES ('$user_name','$email', '$password')";
        mysqli_query($conn, $sql);

        $json_array['status'] = "success";
        //$json_array['msg'] = "success";
        $json_response = json_encode($json_array);
        echo $json_response;

    }
    else{
        $json_array['status'] = 'error';
        $json_array['msg'] = 'email id is already register';
        $json_response = json_decode($json_array);
        echo $json_response;
    }
      }

else
{

    $json_array['status'] = "error";
    $json_array['msg'] = "Email Or Password Was Wrong !!";
    $json_response = json_encode($json_array);
    echo $json_response;
    //echo "{\"result\":\"wrong\"}";


}
function clean($data){
    return filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}

//setcookie('username',$username,time()+60*60*24*365);
// 'Force' the cookie to exists
//$_COOKIE['username'] = $username;