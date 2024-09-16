<?php

if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    setcookie("userId", '', time() + (86400 * 30), "/");
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" sizes="192x192" href="https://schooloftechies.com/assets/img/sot/sot-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    .error {
        color: red;
    }

    .div_img_container img {
        width: 200px;
        height: auto;
        margin-bottom: 20px;
        position: relative;
        left: 35px;
    }

    .signin_container {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 10px 0;
    }

    #login_form input {
        border: 1px solid black;
    }

    #login_form button {
        margin: 5px;
        width: 50%;
    }
</style>

<body>
    <div class="signin_container">
        <div style="width: 300px;">
            <div class="div_img_container">
                <img src="https://logicresearchlabs.com/wp-content/uploads/2022/01/Logic-Research-Labs-2.svg">
            </div>

            <form id="login_form">

                <div class="mb-3">
                    <label for="email_field" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email_field" name="email_field" placeholder="eg:palanivel@mail.com">
                </div>
                <div class="mb-3">
                    <label for="pwd_field" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pwd_field" name="pwd_field" placeholder="eg:@#$%^sdf">
                </div>
                <div style="display:flex;">
                    <button type="button" class="btn btn-warning" onclick="window.location.href='../register/'">Register</button>
                    <button type="button" id="form_btn" class="btn btn-success">Log In</button>
                </div>


            </form>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $('#login_form').validate({
            rules: {

                email_field: {
                    required: true,
                    email: true
                },

                pwd_field: {
                    required: true,
                },

            }

        });


        $('#form_btn').click(function() {


            if ($('#login_form').valid()) {


                var api = 'login_api.php';
                var form = $("#login_form");

                var formData = new FormData(form[0]);
                this.disabled = true;
                this.innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
                $.ajax({
                    type: "POST",
                    url: api,
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function(res) {
                        if (res.status == 'success') {
                            Swal.fire({
                                    title: "Success",
                                    text: res.msg,
                                    icon: "success",
                                    button: "OK",
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    closeOnClickOutside: false,
                                })
                                .then((value) => {
                                    window.location.href = "../students/";
                                });
                        } else if (res.status == 'failure') {

                            Swal.fire({
                                    title: "Failure",
                                    text: res.msg,
                                    icon: "warning",
                                    button: "OK",
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    closeOnClickOutside: false,
                                })
                                .then((value) => {

                                    document.getElementById("form_btn").disabled = false;
                                    document.getElementById("form_btn").innerHTML = 'Sign In';
                                });

                        }
                    },
                    error: function() {

                        Swal.fire('Check Your Network!');
                        document.getElementById("form_btn").disabled = false;
                        document.getElementById("form_btn").innerHTML = 'Sign In';
                    }

                });

            }


        });
    </script>
</body>

</html>