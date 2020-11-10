<?php require_once('./resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php") ?>
<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>



<div id="content" class="site-content">
    <div class="page-header flex-middle">
        <div class="container">
            <div class="inner flex-middle">
                <h1 class="page-title">Notre Équipe</h1>
                <ul id="breadcrumbs" class="breadcrumbs none-style">
                    <li><a href="index.html">Accueil</a></li>
                    <li class="active">Notre Équipe</li>
                </ul>    
            </div>
        </div>
    </div>
    <section class="team-top space-sm-top">
        <div class="container">
            <h2 class="team-top-title">Rencontrez L'équipe des Innovateurs!</h2>
        </div>
        <div class="container-fluid text-center">
            <img src="images/team-img.png" alt="">
        </div>
    </section>
    <section class="team-our space-sm-bottom">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="img-Engitech">
                        <img src="images/team-bottom.png" alt="" class="img-ibtikarcom">
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-xl-block space-150"></div>

        <div class="container">
            <div class="row team-mobile">
                <div class="col-lg-12 text-center">
                    <div class="ot-heading">
                        <span>// notre équipe</span>
                        <h2 class="main-heading">Nous avons une Équipe d'Experts</h2>
                    </div>
                    <div class="space-5"></div>
                    <p>Rencontrez les membres de notre équipe professionnelle.</p>
                    <div class="space-20"></div>
                </div>
            </div>
            <div class="row no-margin">
                
                <?php display_team() ?>

            </div>
        </div>
    </section>
    <section class="team-testi space-sm-bottom">
        <div class="container">
            <div class="cta-h2 mobil contactS-mobile">
                <div class="row">
                    <div class="col-lg-8 col-md-8 mb-4 mb-md-0">
                        <div class="ot-heading">
                            <span>// Contactez-nous pour un premier échange sur vos besoins<br>Vous souhaitez en savoir plus ?</span>
                            <h2 class="main-heading">Demandez un devis</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 align-self-end">
                        <div class="ot-button text-center text-md-right">
                            <a href="" class="octf-btn octf-btn-primary">Contacter Nous</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="ot-heading text-center">
                        <span>// NOS CLIENTS</span>
                        <h2 class="main-heading">We are Trusted <br>15+ Countries Worldwide</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="ot-testimonials">
                        <div class="owl-carousel owl-theme testimonial-inner ot-testimonials-slider">
                        <?php display_testimonials() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include(TEMPLATE_FRONT . DS . "partners.php") ?>
</div>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>