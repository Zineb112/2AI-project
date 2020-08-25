<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>

<header class="hero-headerCI">
<?php include(TEMPLATE_FRONT . DS . "navigation.php") ?>

<section class="carnet-inv">
    <h3 class="carnet-inv__title">
        Carnet de l’inventeur
    </h3>

    <div class="carnet-inv__wrapper">
        <div class="carnetN__carnet margincarn" data-aos="flip-down" data-aos-duration="1000">
            <img src="images/carnet1.png" alt="">
            <div class="carnetN__infos">
                <h3 class="carnetN__infos--date">Magazine mois décembre</h3>
                <h5 class="carnetN__infos--title"> <span>Titre: </span> Pulvinar condimentum </h5>
                <a href="" class="carnetN__download">Télécharger</a>
            </div>
        </div>
        <div class="carnetN__carnet margincarn" data-aos="flip-up" data-aos-duration="1000">
            <img src="images/carnet2.png" alt="">
            <div class="carnetN__infos">
                <h3 class="carnetN__infos--date">Magazine mois décembre</h3>
                <h5 class="carnetN__infos--title"> <span>Titre: </span> Pulvinar condimentum </h5>
                <a href="" class="carnetN__download">Télécharger</a>
            </div>
        </div>
        <div class="carnetN__carnet margincarn" data-aos="flip-down" data-aos-duration="1000">
            <img src="images/carnet3.png" alt="">
            <div class="carnetN__infos">
                <h3 class="carnetN__infos--date">Magazine mois décembre</h3>
                <h5 class="carnetN__infos--title"> <span>Titre: </span> Pulvinar condimentum </h5>
                <a href="" class="carnetN__download">Télécharger</a>
            </div>
        </div>
        <div class="carnetN__carnet margincarn" data-aos="flip-up" data-aos-duration="1000">
            <img src="images/carnet4.png" alt="">
            <div class="carnetN__infos">
                <h3 class="carnetN__infos--date">Magazine mois décembre</h3>
                <h5 class="carnetN__infos--title"> <span>Titre: </span> Pulvinar condimentum </h5>
                <a href="" class="carnetN__download">Télécharger</a>
            </div>
        </div>
    </div>
    <div class="carnet-inv__pagination">
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