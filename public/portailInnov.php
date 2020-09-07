<?php require_once('../resources/config.php'); ?>


<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>

<header class="hero-headerC2">
<?php include(TEMPLATE_FRONT . DS . "navigationC2.php") ?>
<section class="Actualite">
    <div class="ActualiteLeft">
    <h3 class="Actualite__title">Actualité À La Une</h3>
    <p class="Actualite__subtitle">Mauris imperdiet orci dapibus,commodo 
        libero nec, interdum tortor. Morbi in nibh 
        faucibus, iaculis lorem vitae, cursus velit. 
        Etiam non blandit ex.</p>
    <a href="newsC2.php"><button class="Actualite__more hidMoreD">voir tout</button></a>
    </div>
    <div class="ActualiteRight">
        <?php display_newsC2_home() ?>
        <a class="Actualite__moreA" href="newsC2.php"><button class="Actualite__more hidMoreM">voir tout</button></a>

    </div>
</section>
</header>

<section class="innovationN">
    <div class="innovationN__bg">
    <h3 class="innovationN__title">Innovation News</h3>
    <img class="innovationN__line" src="images/lineC2.png" alt="">
    <p class="innovationN__subtitle">Un Journal en ligne, qui diffuse les nouvelles sur l’innovation National et 
        International, les événement passés et à venir.</p>
    </div>
    <div class="innovationN__wrapper">
        <?php display_last_innovNews() ?>
        <a href="innovation-news.php" class="InewsBtnA"><button class="InewsBtn">voir tout</button></a>
    </div>
</section>

<section class="carnetN">
    <div class="carnetN__wrapper">
    <div class="carnetN__left" data-aos="flip-up" data-aos-duration="1300">
        <h3 class="carnetN__title">Carnet de l’inventeur</h3>
        <img class="carnetN__line" src="assets/images/lineC2.png" alt="">
        <p class="carnetN__subtitle">Carnet de l’Inventeur est un magazine mensuel, qui vise à promouvoir les résultats des recherches des inventeurs et des innovateurs, fort d’un contenu riche en informations techniques et stratégiques, et permettra aux entreprises et aux bailleurs de fonds de saisir d’intéressantes opportunités d’investissements à travers la valorisation des inventions qui y sont diffusées.</p>
        <a href="carnet-inv.php" class="carnetN__button">Autre éditions</a>
    </div>
    <?php display_last_carnet() ?>
    </div>
</section>



<section class="portailN">
        <h3 class="portailN__title">Portail De L'inventeur</h3>
        <img class="portailN__line" src="images/lineC2G.png" alt="">
        <p class="portailN__subtitle">Un reportage en ligne des porteurs de projets Inventeurs et des Innovateurs (Success Stories).</p>
        <div class="portailN__wrapper">
        <?php display_portail_home()?>
        </div>
        <a href="portailInventeurPage.php" class="portailN__more">Voir tout</a>
</section>




<section class="aiNews">
    <div class="aiNews__wrapper">
            <div class="aiNews__left" data-aos="flip-down" data-aos-duration="1000">
                    <h3 class="aiNews__title">2AI News</h3>
                    <img class="aiNews__line" src="images/lineC2G.png" alt="">
                    <p class="aiNews__subtitle">Une émission en ligne (formation/guide) sur les divers 
                            services de 2AI, en invitant à chaque épisode un expert
                            en communication, production audiovisuelle ou 
                            événementiel, nous communiquera son expérience et 
                            développera le métier.</p>
                    <a href="" class="aiNews__more">voir tout</a>
            </div>
            <div class="aiNews__right" data-aos="flip-up" data-aos-duration="1000">
                <?php display_last_2AINewsC2() ?>
            </div>
            <a href="" class="aiNews__moreM">voir tout</a>
    </div>
</section>

<section class="downloadApp">
    <div class="downloadApp__wrapper">
        <div class="downloadApp__left" data-aos="flip-left" data-aos-duration="1000" >
            <img src="images/phonDown.png" alt="">
        </div>
        <div class="downloadApp__right" data-aos="flip-right" data-aos-duration="1000">
            <h3 class="downloadApp__title">Obtenez l'application maintenant!</h3>
            <img class="downloadApp__line" src="images/lineC2.png" alt="">
            <p class="downloadApp__subtitle">Tout ce qu'il faut, c'est 30 secondes pour télécharger.
                    Votre application mobile pour les actualités
            </p>
            <div class="downloadApp__down">
            <a href="" class="downloadApp__android"><i class="fa fa-android" aria-hidden="true"></i>Google play</a>
            <a href="" class="downloadApp__apple"><i class="fa fa-apple" aria-hidden="true"></i>App store</a>
            </div>
        </div>
        <div class="downloadApp__downM">
                <a href="" class="downloadApp__android"><i class="fa fa-android" aria-hidden="true"></i>Google play</a>
                <a href="" class="downloadApp__apple"><i class="fa fa-apple" aria-hidden="true"></i>App store</a>
        </div>
    </div>
</section>

<section class="guideI">
        <h3 class="guideI__title">Guide De L’inventeur / Entrepreneur</h3>
        <img class="guideI__line" src="images/lineC2G.png" alt="">
        <p class="guideI__subtitle">Un reportage en ligne présentés par des dirigeants d’entreprises /Investisseurs / Incubateurs/
                Accompagnateurs afin de partager, orienter et de guider les jeunes innovateurs
                vers le monde de l’entreprenariat.
        </p>
        <div class="guideI__wrapper">
            <?php display_last_guide() ?>
        </div>
        <a href="guide.php" class="guideI__more">voir tout</a>
</section>


<?php include(TEMPLATE_FRONT . DS . "newsletterC2.php") ?>
<?php include(TEMPLATE_FRONT . DS . "footerC2.php") ?>
<?php include(TEMPLATE_FRONT . DS . "end.php") ?>