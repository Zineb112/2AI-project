<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>
<header class="headerAlt">
<?php include(TEMPLATE_FRONT . DS . "navigation.php") ?>
<div class="headerAlt__container">
<h3 class="headerAlt__title">Galerie</h3>
<ul class="headerAlt__list">
    <il>
        <a href="index.php">Acceuil</a>
    </il>
    <il>
        >
    </il>
    <il>
        <a href="gallery.php">Galerie</a>
    </il>
</ul>
</div>
</header>

<section class="galleryPage">
<div class="block-title__line"></div>
    <h3 class="actualitesPage__title">Quelques réalisations pour nos clients</h3>
    <p class="actualitesPage__subtitle">Un cocktail de réactivité, créativité et passion au service de nos clients, à découvrir ci-dessous.</p>
    <img class="actualitesPage__bg" src="images/shape.png" alt="">
<ul class="filter-wrap">
        <li class="active-filtre filter" data-filter="all">
            <a>Toutes</a>
        </li>
        <li class="filter" data-filter=".images">
            <a>Images</a>
        </li>
        <li class="filter" data-filter=".video">
            <a>Vidéos</a>
        </li>
</ul>
<div class="galleryCenter">
<div id="Container" class="galleryContainer">
<?php display_gallery() ?>
</div>
</section>




<?php include(TEMPLATE_FRONT . DS . "testimonials.php") ?>
<?php include(TEMPLATE_FRONT . DS . "partners.php") ?>
<?php include(TEMPLATE_FRONT . DS . "newsletter.php") ?>
<?php include(TEMPLATE_FRONT . DS . "end.php") ?>

