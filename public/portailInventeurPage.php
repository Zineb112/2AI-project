<?php require_once('../resources/config.php'); ?>


<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>
<header class="hero-headerP">
<?php include(TEMPLATE_FRONT . DS . "navigationC2.php") ?>
<section class="portailIP">
    <h3 class="portailIP__title">
        Portail De L'inventeur
    </h3>
    <div class="portailIP__wrapper">
    <?php display_portail() ?>
    </div>

</section>
</header>

<?php include(TEMPLATE_FRONT . DS . "newsletterC2.php") ?>
<?php include(TEMPLATE_FRONT . DS . "footerC2.php") ?>
<?php include(TEMPLATE_FRONT . DS . "end.php") ?>