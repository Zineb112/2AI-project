<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>
<header class="headerAlt">
<?php include(TEMPLATE_FRONT . DS . "navigation.php") ?>
<div class="headerAlt__container">
<h3 class="headerAlt__title">Actualités</h3>
<ul class="headerAlt__list">
    <il>
        <a href="index.php">Acceuil</a>
    </il>
    <il>
        >
    </il>
    <il>
        <a href="news.php">Actualités</a>
    </il>
</ul>
</div>
</header>


<section class="newsPost">
    <div class="newsPost__wrapperLeft">
        <?php display_signle_news() ?>
    </div>
    <div class="newsPost__wrapperRight">
        <div class="wrapperRight__search">
            <form action="#" class="form__search">
                <input type="text" placeholder="Recherche..">
                <button type="submit"><i class="far fa-search"></i></button>
            </form>
        </div>
        <div class="wrapperRight__list">
            <h3 class="wrapperRight__list--title">Les catégories</h3>
            <ul>
                <li><a href="#"><i class="far fa-chevron-right"></i>Catégorie 1</a></li>
                <li><a href="#"><i class="far fa-chevron-right"></i>Catégorie 2</a></li>
                <li><a href="#"><i class="far fa-chevron-right"></i>Catégorie 3</a></li>
                <li><a href="#"><i class="far fa-chevron-right"></i>Catégorie 4</a></li>
                <li><a href="#"><i class="far fa-chevron-right"></i>Catégorie 5</a></li>
            </ul>
        </div>
        <div class="wrapperRight__recent">
            <h3 class="wrapperRight__recent--title">Nouvelles récentes</h3>
            <?php display_three_news() ?>
        </div>
        <div class="wrapperRight__newsletter">
            <h3><img src="images/enevolope-open.png" alt=""> Souscrire</h3>
            <form action="#">
                <input type="text" placeholder="Votre adresse mail*">
                <button type="submit">Souscrire</button>
            </form>
        </div>
    </div>
</section>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
<?php include(TEMPLATE_FRONT . DS . "end.php") ?>