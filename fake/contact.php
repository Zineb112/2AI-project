<?php require_once('../resources/config.php'); ?>
<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>

<header class="headerAlt">
<?php include(TEMPLATE_FRONT . DS . "navigation.php") ?>
<div class="headerAlt__container">
<h3 class="headerAlt__title">Contact</h3>
<ul class="headerAlt__list">
    <il>
        <a href="index.php">Acceuil</a>
    </il>
    <il>
        >
    </il>
    <il>
        <a href="contact.php">Contact</a>
    </il>
</ul>
</div>
</header>


<?php send_mail_php() ?>

<p class="contactForm__alertmsg alertMsg"><?php if(isset($send)) echo $send; ?></p>
<p class="contactForm__alertmsg alertMsg"><?php if(isset($notsent)) echo $notsent; ?></p>


<section class="contactPage">
    <div class="block-title__line"></div>
    <h3 class="contactPage__title">Contactez-nous pour toute aide</h3>
    <p class="contactPage__subtitle">Boostez votre communication !
        Un projet à concrétiser ou une idée à développer ? Une demande de devis? 
        Contactez-nous afin d’amorcer une discussion constructive sur votre projet.
        Notre équipe de passionnés est prête à vous écouter, vous comprendre et donner vies à vos idées
        </p>
    <img class="contactPage__bg" src="assets/images/shape.png" alt="">
    <div class="contactPage__Top">
        <div class="contactPage__Top--phone" data-aos="flip-down" data-aos-duration="1000">
            <i class="fas fa-phone-alt"></i>
            <h4>Appelez-nous:</h4><a href="tel:+212 700252045">+212 700252045</a>
        </div>
        <div class="contactPage__Top--message" data-aos="flip-down" data-aos-duration="1000">
            <i class="fas fa-envelope"></i>
            <h4>Mail pour toute aide:</h4><a href="mailto:agenceibtikarcom@gmail.com">agenceibtikarcom@ gmail.com</a>
        </div>
        <div class="contactPage__Top--location" data-aos="flip-down" data-aos-duration="1000">
            <i class="fas fa-map-marker-alt"></i>
            <h4>Localisation:</h4> <a href="">47, Rue Aït Ba Amrane 3ème étage - Casablanca Maroc</a>
        </div>
    </div>
    <div class="contactPage__container" data-aos="flip-up" data-aos-duration="1000">
            <div class="contactPage__maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.376857266383!2d-7.599572080011785!3d33.59552513877128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cd656231c531%3A0x852677196509051e!2sRue%20A%C3%AFt%20Ba%20Amrane%2C%20Casablanca%2020250!5e0!3m2!1sfr!2sma!4v1595863314827!5m2!1sfr!2sma" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="contactPage__form">
            <form  method="POST" action="contact.php">
            <div class="formName">
                <label for="name"></label> 
                <input  name="name" id="name" type="text"  placeholder="Nom complet">
                <p class="contactForm__alertmsg"><?php if(isset($name_error)) echo $name_error; ?></p>

            </div>
            <div class="formEmail">
                <label for="email"></label> 
                <input  name="email" id="email" type="text"  placeholder="Email">
                <p class="contactForm__alertmsg"><?php if(isset($email_error)) echo $email_error; ?></p>

            </div>
            <div class="formSubject">
                <label for="subject"></label>  
                <input  name="subject" id="subject" type="text" placeholder="Votre sujet" >
                <p class="contactForm__alertmsg"><?php if(isset($subject_error)) echo $subject_error; ?></p>

            </div>   
            <div class="formMessage">
                <label for="message"></label> 
                <textarea class = "inputEdit" name="comments" id="message" type="text"  placeholder="Ecrire..."></textarea>
                <p class="contactForm__alertmsg"><?php if(isset($message_error)) echo $message_error; ?></p>

            </div>
            <!-- <button class="sendBtnPage">Envoyer</button> -->
            <input type="submit" id="submit" name="submit" class="sendBtnPage" value="Envoyer"/>
            </form>
            <div id="simple-msg"></div>
            </div>

    </div>
</section>



<?php include(TEMPLATE_FRONT . DS . "testimonials.php") ?>
<?php include(TEMPLATE_FRONT . DS . "partners.php") ?>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
<?php include(TEMPLATE_FRONT . DS . "end.php") ?>