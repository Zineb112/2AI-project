<?php require_once './resources/config.php';?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>2AI | Login Ibtikarat arab agency</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/icon-onglet.png">
    <!-- toastr notification -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="assets/font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Popper js -->
    <script src="assets/js/popper.min.js"></script>
    <!-- jquery-->
    <script src="assets/js/jquery.min.js"></script>
    <!-- toastr notification -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div id="wrapper" class="wrapper">
        <div class="fxt-template-animation fxt-template-layout5">
            <div class="fxt-bg-img fxt-none-767" data-bg-image="assets/images/bg5-l.png">
                <div class="fxt-intro">
                    <div class="sub-title">Welcome To</div>
                    <h1>Ibtikarat arab agency</h1>
                    <p>2.A.I</p>
                </div>
            </div>
            <div class="fxt-bg-color">
                <div class="fxt-header">
                    <a href="login.php" class="fxt-logo"><img src="assets/images/logo.png" alt="Logo"></a>
                    <div class="fxt-page-switcher">
                        <a href="login.php" class="switcher-text switcher-text1 active">LogIn</a>
                        <!-- <a href="register-5.html" class="switcher-text switcher-text2">Register</a> -->
                    </div>
                </div>
                <div class="fxt-form">
				<form  action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>' method="POST">
                        <?php login_users()?>
                        <div class="form-group fxt-transformY-50 fxt-transition-delay-1">
                            <input type="username" class="form-control" name="username" placeholder="Username" required="required">
                            <i class="flaticon-envelope"></i>
                        </div>
                        <div class="form-group fxt-transformY-50 fxt-transition-delay-2">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                            <i class="flaticon-padlock"></i>
                            <a href="forgot-password.php" class="switcher-text3">Forgot Password</a>
                        </div>
                        <div class="form-group fxt-transformY-50 fxt-transition-delay-3">
                            <div class="fxt-content-between">
                                <input type="submit" name="login" value="login" class="fxt-btn-fill">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">Keep me logged in</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery-->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Popper js -->
    <script src="assets/js/popper.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script>
        // toastr.success('We do have the Kapua suite available.', {closeButton: true})
        toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
    </script>
<?php 
   if(isset($_SESSION['msgPasschanged'])){
    set_message('success', $_SESSION['msgPasschanged']);
   }
   display_msg(); ?>
<!-- Bootstrap js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Imagesloaded js -->
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<!-- Validator js -->
<script src="assets/js/validator.min.js"></script>

<!-- Custom Js -->
<script src="assets/js/login-js.js"></script>

</body>

</html>