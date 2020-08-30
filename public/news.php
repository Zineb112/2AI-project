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
<section class="actualitesPage">
    <div class="block-title__line"></div>
    <h3 class="actualitesPage__title">Sachez quelque chose de notre blog</h3>
    <p class="actualitesPage__subtitle">Des conseils, des analyses sur la communication, la création d’entreprise, le web, la presse, le webmarketing, shooting photo ou même sur la production audiovisuelle..</p>
    <img class="actualitesPage__bg" src="assets/images/shape.png" alt="">
</section>
<section class="actualitesPage__container">
<?php display_newsC1_page() ?>
</section>
<div class="post-pagination">
        <a href="#"><i class="fa fa-angle-left"></i></a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#"><i class="fa fa-angle-right"></i></a>
</div>
@@include('includes/newsletter.html')
@@include('includes/end.html')