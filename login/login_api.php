<?php
Include("http://localhost/logic_crud/includes/connection.php");
session_start();

header('Content-Type: application/json');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = clean($_POST['email']);
    $password = clean($_POST['password']);

    $sql = "SELECT * FROM gbuser WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            echo json_encode(["status" => "success", "msg" => "Login successful!"]);
        } else {
            echo json_encode(["status" => "error", "msg" => "Invalid password!"]);
        }
    } else {
        echo json_encode(["status" => "error", "msg" => "No user found with this email!"]);
    }
} else {
    echo json_encode(["status" => "error", "msg" => "Invalid request."]);
}
?>
