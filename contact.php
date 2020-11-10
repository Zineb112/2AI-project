<?php require_once('./resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php") ?>
<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>

        <div id="content" class="site-content">
            <div class="page-header flex-middle">
                <div class="container">
                    <div class="inner flex-middle">
                        <h1 class="page-title">Contact</h1>
                        <ul id="breadcrumbs" class="breadcrumbs none-style">
                                <li><a href="index.html">Accueil</a></li>
                            <li class="active">Contact</li>
                        </ul>    
                    </div>
                </div>
            </div>

            <?php send_mail_php() ?>
            <section class="contact-page">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contact-left">
                                <div class="ot-heading">
                                    <span>// détails du contact</span>
                                    <h2 class="main-heading">Contactez Nous</h2>
                                </div>
                                <div class="space-5"></div>
                                <p>Boostez votre communication ! Un projet à concrétiser ou une idée à développer ? Une demande de devis? Contactez-nous afin d’amorcer une discussion constructive sur votre projet. Notre équipe de passionnés est prête à vous écouter, vous comprendre et donner vies à vos idées.</p>
                                <div class="contact-info box-style1">
                                    <i class="flaticon-world-globe"></i>                    
                                    <div class="info-text">
                                        <h6>Notre adresse:</h6>
                                        <p>47, Rue Aït Ba Amrane 3ème étage - Casablanca Maroc</p>
                                    </div>
                                </div>
                                <div class="contact-info box-style1">
                                    <i class="flaticon-envelope"></i>
                                    <div class="info-text">
                                        <h6>Mail pour toute aide:</h6>
                                        <p>agenceibtikarcom@gmail.com</p>
                                    </div>
                                </div>
                                <div class="contact-info box-style1">
                                    <i class="flaticon-phone-1"></i>
                                    <div class="info-text">
                                        <h6>Notre téléphone:</h6>
                                        <p>+212-700-252-045</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">


<p class="contactForm__alertmsg alertMsg"><?php if(isset($send)) echo $send; ?></p>
<p class="contactForm__alertmsg alertMsg"><?php if(isset($notsent)) echo $notsent; ?></p>
                            <form action="contact.php" method="POST" class="wpcf7">
                                <div class="main-form">
                                    <h2>Prêt à Commencer?</h2>
                                    <p class="font14">Votre adresse email ne sera pas publiée. Les champs requis sont indiqués *</p>
                                    <p>
                                        <input id="name" type="text" name="name" size="40"  aria-required="true" aria-invalid="false" placeholder="Votre Nom *" required/>
                                        <p class="contactForm__alertmsg"><?php if(isset($name_error)) echo $name_error; ?></p>
                                    </p>
                                    <p>
                                        <input id="email" type="email" name="email" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Votre Email *" required/>
                                        <p class="contactForm__alertmsg"><?php if(isset($email_error)) echo $email_error; ?></p>
                                    </p>
                                    <p>
                                        <input id="subject" type="text" name="subject" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Sujet"/>
                                        <p class="contactForm__alertmsg"><?php if(isset($subject_error)) echo $subject_error; ?></p>
                                    </p>
                                    <p>
                                        <textarea id="message" name="comments" cols="40" rows="10" class="" aria-invalid="false" placeholder="Message..." required></textarea>
                                        <p class="contactForm__alertmsg"><?php if(isset($message_error)) echo $message_error; ?></p>
                                    </p>
                                    <p><input id="submit" type="submit" value="Envoyer" class="octf-btn octf-btn-light"></input>
                                    </p>
                                </div>
                            </form>
                            <div id="simple-msg"></div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="no-padding">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3323.402678255578!2d-7.600473!3d33.594855!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cd656231c531%3A0x852677196509051e!2sRue%20A%C3%AFt%20Ba%20Amrane%2C%20Casablanca%2020250!5e0!3m2!1sfr!2sma!4v1604367157352!5m2!1sfr!2sma" height="500" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <?php include(TEMPLATE_FRONT . DS . "partners.php") ?>
        </div>


     <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>