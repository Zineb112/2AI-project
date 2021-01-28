<?php require_once('./resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php") ?>
<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>

<div id="content" class="site-content">
    <div class="page-header flex-middle">
        <div class="container">
            <div class="inner flex-middle">
                <h1 class="page-title">À propos</h1>
                <ul id="breadcrumbs" class="breadcrumbs none-style">
                    <li>
                        <a href="index.php">Accueil</a>
                    </li>
                    <li class="active">À propos</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="about-offer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center mb-30 mb-lg-0">
                    <div class="ot-heading">
                        <span>// À propos de nous</span>
                    </div>
                    <div class="space-5"></div>
                    <p>Agence IbtikarCom, chargée de la communication et de la production en
                        Audiovisuel, et événementielle de la veille technologique, de l’invention et
                        de l’innovation. Elle s’occupe de l’accompagnement des projets innovants pour le
                        développement durable et sociale. IbtikarCom assure la promotion de
                        l’invention, de l’innovation et de l’intelligence Arabe et Africaine pour le
                        développement du tissu économique.</p>
                    <p>
                        <em class="text-dark">
                            <strong>IbtikarCom est également reconnue pour les performances, la fiabilité,
                                la sécurité et la qualité de ses applicatifs web et mobiles.</strong>
                        </em>
                    </p>
                    <div class="space-20"></div>
                    <div class="video-popup style-2">
                        <div class="btn-inner">
                            <a class="btn-play" href="https://www.youtube.com/watch?v=8LJJZispcG4">
                                <i class="flaticon-play"></i>
                                <span class="circle-1"></span>
                                <span class="circle-2"></span>
                            </a>
                        </div>
                        <span>VIDÉO SHOWCASE</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <a class="ot-image-box v3 st1" href="#services">
                                <div class="overlay">
                                    <h4>Nos Services</h4>
                                </div>
                                <img src="images/service-bg.png" alt="Nos Services">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <a class="ot-image-box v3 st2" href="#objectifs">
                                <div class="overlay">
                                    <h4>Nos objectifs</h4>
                                </div>
                                <img src="images/objective-bg.png" alt="Nos objectifs">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <a class="ot-image-box v3 st3" href="#teams">
                                <div class="overlay">
                                    <h4>Notre Équipe</h4>
                                </div>
                                <img src="images/team-bg.png" alt="Notre Équipe">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <a class="ot-image-box v3 st4 mb-0" href="#partners">
                                <div class="overlay">
                                    <h4>Nos Partenaires</h4>
                                </div>
                                <img src="images/partners-bg.png" alt="Nos Partenaires">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include(TEMPLATE_FRONT . DS . "services.php") ?>
    <?php include(TEMPLATE_FRONT . DS . "objectives.php") ?>

    <section class="about-team" id="teams">
        <div class="container">
            <div class="row margin-team-about">
                <div class="col-md-8 col-sm-8 mb-4 mb-sm-0">
                    <div class="ot-heading mb-0">
                        <span>// NOTRE ÉQUIPE</span>
                        <h2 class="main-heading">Nous avons une Équipe d'Experts</h2>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-sm-right align-self-end">
                    <div class="ot-button">
                        <a href="team.php" class="octf-btn octf-btn-primary">voir tout</a>
                    </div>
                    <div class="space-10"></div>
                </div>
            </div>
            <div class="row no-margin">
                <?php display_team_about() ?>
            </div>
        </div>
    </section>
    <?php include(TEMPLATE_FRONT . DS . "consultation.php") ?>
    <?php include(TEMPLATE_FRONT . DS . "partners.php") ?>
</div>

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>