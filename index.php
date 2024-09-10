<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="my-4">Login</h2>
    <form id="loginForm">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <p class="mt-3">Don't have an account? <a href="http://localhost/logic_crud/register/">Register here</a></p>
</div>

<script>
$(document).ready(function() {
    $("#loginForm").submit(function(e) {
        e.preventDefault();

        let formData = {
            email: $("#email").val(),
            password: $("#password").val()
        };

        $.ajax({
            url: "login_api.php", // API URL
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    Swal.fire('Success!', response.msg, 'success').then(() => {
                        window.location.href = 'student_list.html'; // Redirect to student list page
                    });
                } else {
                    Swal.fire('Error!', response.msg, 'error');
                }
            },
            error: function() {
                Swal.fire('Error!', 'An error occurred while logging in.', 'error');
            }
        });
    });
});
</script>
</body>
</html>
