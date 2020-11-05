<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title>Ibtikarcom | Makes your Innovation known</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet" />
	<!-- Ico Font CSS -->
	<link rel="stylesheet" href="css-soon/icofont.css" />
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css-soon/bootstrap.min.css" />
	<!-- Style CSS -->
	<link rel="stylesheet" href="css-soon/style.css" />
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css-soon/responsive.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/royal-preload.css" />

	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


</head>
<body class="bg-img body-bg">
	<div id="wavybg-wrapper"> 
		<canvas>Your browser does not support HTML5 canvas.</canvas>
	</div>
	<!-- PREALODER START -->

	<!-- PREALODER END -->
	<!-- SHAPE START -->

	<!-- SHAPE END -->

	<div class="bg-img color-white main-container">


		<!-- BODY PART START -->
		<div class="tab-content" id="pills-tabContent">
			<!-- HOME PART -->
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				<div id="main-content-home" class="xs-no-positioning fixed fixed-middle">
					<div>
						<div class="container">
							<div class="row">
								<div class="col-12">
									<div class="title">
										<p class="small-title">NOUS ARRIVONS BIENTÔT</p>
										<span class="main-title">RESTEZ À L'ÉCOUTE</span>
									</div>
								</div>
							</div>
						</div>
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-sm-12 col-md-10 col-lg-7 col-xl-7">
									<div class="counter-style1">
										<input type="hidden" id="count-down-date" name="count-down-date" value="31 Dec, 2022 12:00:00" />
										<h2 class="expired-text hidden">Welcome to Our Website</h2>
										<div class="countdown-timer" id="countdown-boxes">
											<ul class="list-inline count-down-list text-center">
												<!-- <li id="months"><span class="months">1</span><span class="counter-time-title">Months</span></li> -->
												<li ><span id="days" class="days">30</span><span class="counter-time-title">Days</span></li>
												<li ><span id="hours" class="hours">24</span><span class="counter-time-title">Hours</span></li>
												<li ><span id="minutes" class="minutes">50</span><span class="counter-time-title">Minutes</span></li>
												<li ><span id="seconds" class="seconds">55</span><span class="counter-time-title">Seconds</span></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<form method="post" class="wpcf7-form init">
								<div class="cs-form">
								<span class="wpcf7-form-control-wrap your-email">
									<input type="email" name="your-email" value="" size="38" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Votre Email *"></span><button class="octf-btn">Souscrire</button>
								</div>
							</form>
							<div class="ft-list-icon  text-center soon-media">
								<a class="facebook" href="facebook.com"><i class="fab fa-facebook-f"></i></a>
								<a class="linkedin" href="linkedin.com"><i class="fab fa-linkedin-in"></i></a>
								<a class="instagram" href="instagram.com"><i class="fab fa-instagram"></i></a>
								<a class="twitter" href="twitter.com"><i class="fab fa-youtube"></i></a>
							</div>
					</div>
				</div>
			</div>

		</div>
		<!-- BODY PART END -->
	</div>
	
	<!-- jQuery -->
	<script src="js-soon/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js-soon/bootstrap.min.js"></script>
	<!-- waterpipe JS -->
	<script src="js-soon/waterpipe.js"></script>
	<!-- scripts -->
	<script src="js-soon/scripts.js"></script>
	<script>
		var smokyBG = $('#wavybg-wrapper').waterpipe({
			gradientStart: '#43baff',
			gradientEnd: '#10266b',
		});
	</script>

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
                url: "../ajaxCalls.php",
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
                url: "../ajaxCalls.php",
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
                url: "../ajaxCalls.php",
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
</body>
</html>
