<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>

<header class="headerPost">
<?php include(TEMPLATE_FRONT . DS . "navigationC2.php") ?>

 <section class="newspostC2">
     <?php display_signle_newsC2() ?>
</section>

<section class="lastNews">
    <h3 class="lastNews__title">Derniers actualités</h3>
    <div class="lastNews__wrapper">
    <?php display_three_newsC2() ?>
</div>
</section>

</header>
<?php include(TEMPLATE_FRONT . DS . "newsletterC2.php") ?>
<?php include(TEMPLATE_FRONT . DS . "footerC2.php") ?>
<?php include(TEMPLATE_FRONT . DS . "end.php") ?> 
