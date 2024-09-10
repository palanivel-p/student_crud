<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="my-4">Register</h2>
    <form id="registerForm">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <p class="mt-3">Already registered? <a href="login.html">Login here</a></p>
</div>

<script>
$(document).ready(function() {
    $("#registerForm").submit(function(e) {
        e.preventDefault();

        let formData = {
            email: $("#email").val(),
            password: $("#password").val()
        };

        $.ajax({
            url: "register_api.php", // API URL
            type: "POST",n
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    Swal.fire('Success!', response.msg, 'success').then(() => {
                        window.location.href = 'login.html'; // Redirect to login page
                    });
                } else {
                    Swal.fire('Error!', response.msg, 'error');
                }
            },
            error: function() {
                Swal.fire('Error!', 'An error occurred while registering.', 'error');
            }
        });
    });
});
</script>
</body>
</html>
