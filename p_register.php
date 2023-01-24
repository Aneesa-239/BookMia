<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BookMia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <a href="index.php" class="navbar-brand logo">
                        <img src="assets/img/favicon.png" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="index.php" class="menu-logo">
                            <img src="assets/img/favicon.png" class="img-fluid" alt="Logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <ul class="main-nav">
                        <li>
                            <a href="index.php" style="color: #fefefe">Home</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav header-navbar-rht">
                    <li class="nav-item contact-item">

                        <div class="header-contact-detail">

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link header-login" href="login.php">login / Signup </a>
                    </li>
                </ul>
            </nav>
        </header>
        <!-- /Header -->

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <!-- Register Content -->
                        <div class="account-content">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-7 col-lg-6 login-left">
                                    <img src="assets/img/login-banner.png" class="img-fluid" alt="BookMia Register">
                                </div>
                                <div class="col-md-12 col-lg-6 login-right">
                                    <div class="login-header">
                                        <h3>Patient Register </h3>
                                    </div>

                                    <!-- Register Form -->
                                    <form id="RegisterForm" action="assets/php/register.php" method="POST"
                                        autocomplete="off">
                                        <div class="form-group card-label">
                                            <label>Name</label>
                                            <input type="text" name="name" id="name" class="form-control floating"
                                                required pattern="[a-zA-Z]+" title="Letters Only">
                                        </div>
                                        <div class="form-group card-label">
                                            <label>Surname</label>
                                            <input type="text" name="surname" id="surname" class="form-control floating"
                                                required pattern="[a-zA-Z]+" title="Letters Only">
                                        </div>
                                        <div class="form-group card-label">
                                            <label>Email Address</label>
                                            <input type="text" class="form-control floating" name="email" id="email"
                                                required
                                                pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})"
                                                title="Example: name@email.com" placeholder="name@email.com">
                                        </div>
                                        <div class="form-group card-label">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control floating" name="phone" id="phone"
                                                pattern="[0-9]+" maxlength="10" title="Enter a 10 digit phone number">
                                        </div>
                                        <div class="form-group card-label">
                                            <label>Password</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control floating" required autocomplete="off"
                                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$"
                                                title="Must contain 8 to 12 uppercase, lowercase letters, numbers and symbols">
                                        </div>
                                        <div class="form-group card-label">
                                            <label>Confirm Password</label>
                                            <input type="password" autocomplete="off" class="form-control floating"
                                                id="retype-password">
                                        </div>
                                        <div>
                                            <div class=" text-right dont-have">Already have an account? <a
                                                    href="login.php">Login Here</a></div>

                                        </div>
                                        <button class="btn btn-primary btn-block btn-lg login-btn" name="submit"
                                            type="submit">Signup</button>
                                    </form>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong> Your <a href="#" class="alert-link">Account</a> has
                                        been registered successfully.
                                        <button type="button" href="login.php" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert2"
                                        hidden>
                                        <strong>Oops</strong> A <a href="#" class="alert-link">problem</a> has been
                                        occurred while submitting your data. Please try again.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert"
                                        id="alert3" hidden>
                                        <strong>Wait</strong> We already have a user with this email.
                                        <button type="button" href="p_register.php" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <!-- /Register Form -->
                                </div>
                            </div>
                        </div>
                        <!-- /Register Content -->

                    </div>
                </div>

            </div>

        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/Register.js"></script>
    <script>
    $(document).ready(function() {
        $("#RegisterForm").submit(function(event) {
            var formData = {
                name: $('#name').val(),
                surname: $("#surname").val(),
                phone: $("#phone").val(),
                email: $("#email").val(),
                password: $("#password").val()
            };

            $.ajax({
                    type: "POST",
                    url: "assets/php/register.php",
                    data: formData,
                    dataType: "json",
                    encode: true,
                }).done(function(data) {
                    if (data.msg != "user already exists") {
                        if (data.status == true) {
                            console.log('ajax success = ' + data.msg);
                            $('#alert1').removeAttr("hidden");
                        } else {
                            $('#alert2').removeAttr("hidden");
                            console.log('ajax error = ' + data.msg);
                        }
                    } else {
                        $('#alert3').removeAttr("hidden");
                        console.log('ajax error = ' + data.msg);
                    }
                })
                .fail(function(data) {
                    $('#alert3').removeAttr("hidden");
                    console.log(data);

                });
            event.preventDefault();
        });
    });
    </script>


</body>

</html>