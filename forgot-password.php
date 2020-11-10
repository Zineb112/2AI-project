<?php require_once('./resources/config.php'); ?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ibtikarcom | S'identifier</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- toastr notification -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css" />
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- jquery-->
    <script src="js/jquery.min.js"></script>
    <!-- toastr notification -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/login.css">
</head>

<body>
<?php forgot_password(); ?>
    <div id="wrapper" class="wrapper">        
        <div class="fxt-template-animation fxt-template-layout5">
            <div class="fxt-bg-img fxt-none-767" data-bg-image="images/slide1-home1.jpg">

            </div>
            <div class="fxt-bg-color">
                <div class="fxt-header">
                    <a href="login.php" class="fxt-logo" id="logo-dashboard"><img src="images/logo.png" alt="Logo"></a>
                    <div class="fxt-intro">
                    <div class="sub-title">Bienvenue à</div>
                    <h1>Ibtikarcom</h1>
                </div>
                    <div class="fxt-page-switcher">
                        <a href="login.php" class="switcher-text switcher-text1">LogIn</a>
                    </div>
                </div>
                <div class="fxt-form">
                    <form method="POST">
                        <div class="form-group fxt-transformY-50 fxt-transition-delay-2">                                                
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required="required">
                            <i class="flaticon-envelope"></i>
                        </div>
                        <div class="form-group fxt-transformY-50 fxt-transition-delay-4">
                            <button type="submit" class="fxt-btn-fill" name="forgot_email">Send Me Email</button>
                        </div>
                    </form>                            
                </div> 
            </div>   
        </div>
    </div>

<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- Imagesloaded js -->
<script src="js/imagesloaded.pkgd.min.js"></script>
<!-- Validator js -->
<script src="js/validator.min.js"></script>

<!-- Custom Js -->
<script src="js/login-js.js"></script>

</body>


</html>