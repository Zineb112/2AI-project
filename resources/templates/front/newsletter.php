<setion class="newsletter">
    <div class="newsletter__container">
        <h3 class="newsletter__title">Envoyez-nous une newsletter pour être
            <br>
                <span>mis à jour</span>
            </h3>
            <form
                class="newsletter__form needs-validation"
                method="POST"
                action="#"
                role="email">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <input
                    type="email"
                    placeholder="Votre adresse mail"
                    id="subscriberEmail"
                    name="email"
                    required="required">
                    <a
                        class="newsletter"
                        href="#"
                        id="submit_email_subscribe"
                        type="submit"
                        name="submit">
                        <button>Abonnez-vous</button>
                    </a>
                </form>
            </div>
        </setion>
        <footer class="footerN">
            <div class="footerN__container">
                <div class="footerN__card1">
                    <div class="footerN__logo">
                        <img src="assets/images/logo.png" alt=""></div>
                        <p class="footerN__para">C’est un Organisme professionnel Privé, chargé de la
                            communication et de la production en Audiovisuel, et évènementielle de la veille
                            technologique, de l’invention et de l’innovation.</p>
                        <h3 class="footerN__heure">Heures d'ouvertures:</h3>
                        <p class="footerN__jour">Lun - Sam: Du 9h à 16:30
                            <br>
                                Dimanche: Fermée</p>
                        </div>
                        <div class="footerN__card2">
                            <h3 class="footerN__title">Liens</h3>
                            <ul class="listLinks">
                                <li>
                                    <a href="index.php">Acceuil</a>
                                </li>
                                <li>
                                    <a href="aboutUs.php">À propos</a>
                                </li>
                                <li>
                                    <a href="team.php">Équipe</a>
                                </li>
                                <li>
                                    <a href="gallery.php">Galerie</a>
                                </li>
                                <li>
                                    <a href="contact.php">Contact</a>
                                </li>
                                <li>
                                    <a href="news.php">Actualités</a>
                                </li>
                                <li>
                                    <a href="portailInnov.php">Portail de l'innovation</a>
                                </li>
                                <li>
                                    <a href="carnet-inv.php">Carnet de l'inventeur</a>
                                </li>
                                <li>
                                    <a href="Innovation-news.php">Innovation News</a>
                                </li>
                                <li>
                                    <a href="2AINewsC2.php">2AI news</a>
                                </li>
                                <li>
                                    <a href="guide.php">Guide de l’Inventeur</a>
                                </li>
                                <li>
                                    <a href="portailInventeurPage.php">Portail de l’Innovateur</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footerN__card3">
                            <h3 class="footerN__titleC">Nous contacter</h3>
                            <div class="footerN__informations">
                                <i class="fa fa-map-pin" aria-hidden="true">
                                    <a href="">47, Rue Aït Ba Amrane 3ème étage - Casablanca Maroc</a>
                                </i>
                                <i class="fa fa-phone" aria-hidden="true">
                                    <a href="tel:+212 700252045">+212 700252045</a>
                                </i>
                                <i class="fa fa-envelope" aria-hidden="true">
                                    <a href="mailto:agenceibtikarcom@gmail.com">agenceibtikarcom@ gmail.com</a>
                                </i>
                            </div>
                            <ul class="socialMediaLinks">
                                <li>
                                    <a
                                        href="www.facebook.com/Agence-Arabeibtikarat-385218058877531/"
                                        target="_blank">
                                        <i class="fab fa-facebook-f icon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="www.instagram.com/inno_vationagency87/" target="_blank">
                                        <i class="fab fa-instagram icon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="www.linkedin.com/in/agence-arabe-ibtikarat-27534617b/" target="_blank">
                                        <i class="fab fa-linkedin-in icon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="www.youtube.com/channel/UClhNeKltdA9BrnlYOE6YkCw" target="_blank">
                                        <i class="fab fa-youtube icon"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </footer>
                <div class="bottomFooter">
                    <h3 class="bottomFooter__title">
                        Copyright © 2020 Designed by
                        <span>YouCode Students</span>
                    </h3>
                </div>

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