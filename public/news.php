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
        <div class="blog-one__single" data-aos="flip-down" data-aos-duration="1000">
                <div class="blog-one__image">
                    <img src="images/news4.png" alt="">
                    <a href="news-post.html"><i class="fas fa-plus"></i></a>
                </div><!-- /.blog-one__image -->
                <div class="blog-one__content">
                    <div class="blog-one__meta">
                        <a href="#"><i class="fas fa-calendar-alt"></i>September 12, 2019</a>
                        <a href="#"><i class="fas fa-user"></i>Admin</a>
                    </div><!-- /.blog-one__meta -->
                    <h3><a href="news-post.html">Strategy for Norway's Peion Fund Global.</a></h3>
                    <a href="news-post.html" class="thm-btn blog-one__btn"><span>View more</span></a>
                    <!-- /.thm-btn blog-one__btn -->
                </div><!-- /.blog-one__content -->
        </div><!-- /.blog-one__single -->
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