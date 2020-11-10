<?php require_once('./resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php") ?>
<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>




        <div id="content" class="site-content">
            <div class="page-header flex-middle">
                <div class="container">
                    <div class="inner flex-middle">
                        <h1 class="page-title">Actualités</h1>
                        <ul id="breadcrumbs" class="breadcrumbs none-style">
                            <li><a href="index.php">Acceuil</a></li>
                            <li class="active">Actualités</li>
                        </ul>    
                    </div>
                </div>
            </div>
        </div>

        <div class="entry-content">
            <div class="container">
                <div class="row">
                    <div class="content-area col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <article class="blog-post post-box">
                            <?php display_single_post() ?>
                                <div class="post-relate">
                                    <h2>Articles Similaires</h2>
                                    <div class="row">
                                    <?php display_two_post() ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="widget-area primary-sidebar col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <!-- <aside id="author_widget-1" class="widget engitech_author-widget">
                            <div class="author-widget_wrapper text-center">
                                <div class="author-widget_image-wrapper">
                                    <img class="author-widget_image" src="https://via.placeholder.com/270x375.png" alt="Jina Peterson">
                                </div>
                                <div class="author-widget_info">
                                    <h5 class="author-widget_title">Jina Peterson</h5>
                                    <p class="author-widget_text">She is the CEO. She's a big fan her cat Tux, &amp; dinner parties.</p>
                                    <div class="author-widget_social">
                                        <a class="social-twitter" href="twitter.com"><i class="fab fa-twitter"></i></a>
                                        <a class="social-facebook" href="facebook.com"><i class="fab fa-facebook-f"></i></a>
                                        <a class="social-linkedin" href="linkedin.com"><i class="fab fa-linkedin-in"></i></a>
                                        <a class="social-instagram" href="instagram.com"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <aside class="widget widget_categories">
                            <h5 class="widget-title">Categories</h5>
                            <ul>
                                <li><a href="#">Design</a> <span class="posts-count">(3)</span></li>
                                <li><a href="#">Development</a> <span class="posts-count">(5)</span></li>
                                <li><a href="#">Startup</a> <span class="posts-count">(1)</span></li>
                                <li><a href="#">Technology</a> <span class="posts-count">(3)</span></li>
                            </ul>
                        </aside>
                        <aside id="search-2" class="widget widget_search">
                            <form role="search" method="get" id="search-form" class="search-form">
                                <input type="search" class="search-field" placeholder="Search…" value="" name="s">
                                <button type="submit" class="search-submit"><i class="flaticon-search"></i></button>
                            </form>
                        </aside> -->
                        <aside class="widget widget_recent_news">
                            <h5 class="widget-title">Actualités récents</h5>
                            <ul class="recent-news clearfix">
                            <?php display_last_three_post() ?>
                            </ul>
                        </aside>
                        <aside class="widget widget_media_image">
                            <a href="contact.php"><img class="contact-post-img" src="images/contact-post.png" alt=""></a>
                        </aside>
                    </div>
                </div>
            </div>
        </div>

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>