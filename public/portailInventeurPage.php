<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>
<header class="hero-headerP">
<?php include(TEMPLATE_FRONT . DS . "navigationC2.php") ?>
<section class="portailIP">
    <h3 class="portailIP__title">
        Portail De L'inventeur
    </h3>
    <div class="portailIP__wrapper">
        <div class="portailN__inv" data-aos="flip-down" data-aos-duration="1000">
            <div class="portailN__inv--top">
                <img src="images/person1.png" alt="">
                <a href=""><i class="fas fa-play"></i></a>
            </div>
            <div class="portailN__inv--bottom">
                <h3 class="portailN__name">Bill Gates</h3>
                <h3 class="portailN__role">PDG Microsoft</h3>
                <h3 class="portailN__titleI">Règles de succès</h3>
                <a href="" class="portailN__play">Lire la vidéo</a>
            </div>
        </div>
    </div>

    <div class="portailIP__pagination">
        <a href="#"><i class="fa fa-angle-left"></i></a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#"><i class="fa fa-angle-right"></i></a>
</div>
</section>
</header>

<?php include(TEMPLATE_FRONT . DS . "newsletterC2.php") ?>
<?php include(TEMPLATE_FRONT . DS . "footerC2.php") ?>
<?php include(TEMPLATE_FRONT . DS . "end.php") ?>