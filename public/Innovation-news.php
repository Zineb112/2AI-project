<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>
<header class="hero-headerIN">

<?php include(TEMPLATE_FRONT . DS . "navigationC2.php") ?>


<section class="innov-newsP">
    <h3 class="innov-newsP__title">
        Innovation News
    </h3>
    <div class="innov-newsP__wrapper">
    <?php display_innovNews() ?>        
    </div>
    <div class="innov-newsP__pagination">
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