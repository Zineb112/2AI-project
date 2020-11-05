<footer id="site-footer" class="site-footer footer-v1 padding-mobile_footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="widget-footer">
                        <h5 class="text-white textFooter">Services</h5>
                        <ul class="list-items">
                            <li class="list-item"><a href="">Web Development</a></li>
                            <li class="list-item"><a href="">Mobile Development</a></li>
                            <li class="list-item"><a href="">On-Demand Apps</a></li>
                            <li class="list-item"><a href="">Dedicated Team</a></li>
                            <li class="list-item"><a href="">iOS & Android</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="widget-footer">
                        <h5 class="text-white textFooter">Portail de l'innovation</h5>
                        <ul class="list-items">
                            <li class="list-item"><a href="soon.php" target="_blank">Innovation News</a></li>
                            <li class="list-item"><a href="soon.php" target="_blank">Carnet de l’inventeur</a></li>
                            <li class="list-item"><a href="soon.php" target="_blank">Portail De L'inventeur</a></li>
                            <li class="list-item"><a href="soon.php" target="_blank">2AI News</a></li>
                            <li class="list-item"><a href="soon.php" target="_blank">Guide De L’inventeur</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="widget-footer">
                        <h5 class="text-white textFooter">Agence</h5>
                        <ul class="list-items">
                            <li class="list-item"><a href="about-us.php">À propos de L'agence</a></li>
                            <li class="list-item"><a href="team.php">Équipe</a></li>
                            <li class="list-item"><a href="projects.php">Projets</a></li>
                            <li class="list-item"><a href="blog.php">Blog</a></li>
                            <li class="list-item"><a href="contact.php">Contact</a></li>
                            <li class="list-item"><a href="faq.php">FAQS</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="widget-footer">
                        <h5 class="text-white textFooter">Souscrire</h5>
                        <p>Suivez notre newsletter pour rester à jour sur l'agence.</p>
                        <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-1343 needs-validation" method="post" action="#" role="email">
                            <div class="mc4wp-form-fields">
                                <div class="subscribe-inner-form">
                                    <input id="subscriberEmail" type="email" name="email" placeholder="Votre E-mail" required="">
                                    <button id="submit_email_subscribe" name="submit" type="submit" class="subscribe-btn-icon"><i class="flaticon-telegram"></i></button>
                                </div>  
                            </div>
                        </form>
                        <script>
    $(document).ready(function () {
        var form = document.getElementsByClassName("needs-validation");
        $('#submit_email_subscribe').click(function (e) {
            e.preventDefault()
            console.log('clicked');
            if (form[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                form[0]
                    .classList
                    .add("was-validated");
                return
            }
            var email = $('#subscriberEmail').val();
            console.log(email);
            $.ajax({
                type: "POST",
                url: "./ajaxCalls.php",
                dataType: "json",
                data: {
                    subscribe: "newsletter",
                    subEmail: email
                },
                success: function (data) {
                    console.log(data);
                    if (data.code == "200") {
                        toastr.success(data.msg);
                    } else {
                        toastr.error(data.msg);
                    }
                    $('#subscriberEmail').val("");
                }

            });
        });
    });
    $(document).ready(function () {
        var form = document.getElementsByClassName("needs-validation");
        $('#submit_email_footer').click(function (e) {
            e.preventDefault()
            console.log('clicked');
            var email = $('#email-input').val();
            if (email == "") {
                toastr.error("please provide a valid email");
                return
            }
            console.log(email);
            $.ajax({
                type: "POST",
                url: "./ajaxCalls.php",
                dataType: "json",
                data: {
                    subscribe: "newsletter",
                    subEmail: email
                },
                success: function (data) {
                    console.log(data);
                    if (data.code == "200") {
                        toastr.success(data.msg);
                    } else {
                        toastr.error(data.msg);
                    }
                    $('#email-input').val("");
                }

            });
        });
    });
    $(document).ready(function () {
        var form = document.getElementsByClassName("needs-validation");
        $('#submit_mailbox_subscribe').click(function (e) {
            e.preventDefault()
            console.log('clicked');
            var email = $('#mailboxEmail').val();
            if (email == "") {
                toastr.error("please provide a valid email");
                return
            }
            console.log(email);
            $.ajax({
                type: "POST",
                url: "./ajaxCalls.php",
                dataType: "json",
                data: {
                    subscribe: "newsletter",
                    subEmail: email
                },
                success: function (data) {
                    console.log(data);
                    if (data.code == "200") {
                        toastr.success(data.msg);
                    } else {
                        toastr.error(data.msg);
                    }
                    $('#mailboxEmail').val("");
                }

            });
        });
    });
</script>
                        <div class="ft-list-icon socialMedia">
                                <a class="facebook" href="facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a class="instagram" href="instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a class="youtube" href="youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a class="linkedin" href="https://www.linkedin.com/company/international-innovation-agency/?originalSubdomain=ma" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-65">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="images/logo-white.svg" alt="" class="lazyloaded" data-ll-status="loaded">
                </div>
                <div class="col-md-6 text-left text-md-right align-self-center">
                    <p class="copyright-text">Copyright © 2020 Ibtikarcom by Youcode Students. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer><!-- #site-footer -->
</div><!-- #page -->
<a id="back-to-top" href="#" class="show"><i class="flaticon-up-arrow"></i></a>
        <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/easypiechart.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/header-mobile.js"></script>
    <!-- REVOLUTION JS FILES -->

    <script  src="plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script  src="plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->    
    <script  src="plugins/revolution/revolution/js/extensions/revolution-plugin.js"></script>

    <!-- REVOLUTION SLIDER SCRIPT FILES -->
    <script  src="js/rev-script-2.js"></script>
    <script src="js/royal_preloader.min.js"></script>
    <script>
        window.jQuery = window.$ = jQuery;  
        (function($) { "use strict";
            //Preloader
            Royal_Preloader.config({
                mode           : 'logo',
                logo           : 'images/logo.svg',
                showProgress   : true,
                showPercentage : true,
                text_colour: '#000000',
                background:  '#ffffff'
            });
        })(jQuery);
    </script> 
</body>
</html>