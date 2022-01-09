<?php require_once('../resources/config.php');?>
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="assets/font/flaticon.css">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style-login.css">
    <!-- jquery-->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Popper js -->
    <script src="assets/js/popper.min.js"></script>
    <!-- toastr notification -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>

<body>
<?php new_password_insert(); ?>
    <div id="wrapper" class="wrapper">        
        <div class="fxt-template-animation fxt-template-layout5">
            <div class="fxt-bg-img fxt-none-767" data-bg-image="assets/images/bg5-l.jpg">
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
                        <a href="login.php" class="switcher-text switcher-text1">LogIn</a>
                    </div>
                </div>
                <div class="fxt-form">
                    <?php change_pass(); ?>                  
                </div> 
                <div class="fxt-footer">
                    <ul class="fxt-socials">
                        <li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-6"><a href="#"
                                title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="fxt-twitter fxt-transformY-50 fxt-transition-delay-7"><a href="#" title="twitter"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li class="fxt-google fxt-transformY-50 fxt-transition-delay-8"><a href="#" title="google"><i
                                    class="fab fa-google-plus-g"></i></a></li>
                        <li class="fxt-linkedin fxt-transformY-50 fxt-transition-delay-9"><a href="#"
                                title="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
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
    <?php display_msg() ?>
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