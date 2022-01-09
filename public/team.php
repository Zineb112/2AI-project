<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>
<header class="headerAlt">
<?php include(TEMPLATE_FRONT . DS . "navigation.php") ?>
<div class="headerAlt__container">
<h3 class="headerAlt__title">Équipe</h3>
<ul class="headerAlt__list">
    <il>
        <a href="index.php">Acceuil</a>
    </il>
    <il>
        >
    </il>
    <il>
        <a href="team.php">Équipe</a>
    </il>
</ul>
</div>
</header>





<section class="teamPage">
        <div class="block-title__line"></div>
    <h3 class="contactPage__title">Nous avons une équipe d'experts</h3>
    <p class="contactPage__subtitle">Rencontrez les membres de notre équipe professionnelle</p>
    <img class="contactPage__bg" src="images/shape.png" alt="">
    <div class="teamPage__container">
    
    <?php display_team() ?>
           
    </div>
</section>


<?php include(TEMPLATE_FRONT . DS . "contactSection.php") ?>


<?php include(TEMPLATE_FRONT . DS . "partners.php") ?>

<?php include(TEMPLATE_FRONT . DS . "newsletter.php") ?>
<?php include(TEMPLATE_FRONT . DS . "end.php") ?>

