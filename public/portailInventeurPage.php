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