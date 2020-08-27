<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>

<header class="hero-headerC2NP">
<?php include(TEMPLATE_FRONT . DS . "navigationC2.php") ?>


<section class="AinewsP">
    <h3 class="AinewsP__title">2AI News</h3>
    <div class="AinewsP__wrapper">      
    <?php display_2AINewsC2() ?>
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