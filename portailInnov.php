<?php require_once('./resources/config.php'); ?>
<?php include(TEMPLATE_FRONT . DS . "headC2.php") ?>

<body>
    <div class="preloader">
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="inner" data-tilt="data-tilt" data-tilt-perspective="2000">
            <figure class="fadeInUp animated">
                <img src="assets_c2/images/preloader.gif" alt="Image">
            </figure>
            <span class="typewriter" id="typewriter"></span>
        </div>
        <!-- end inner -->
    </div>
    <!-- end preloader -->
    <div class="transition-overlay">
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
    </div>
    <!-- end transition-overlay -->
    <div class="navigation-menu">
        <div class="bg-layers">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!-- end bg-layers -->
        <div class="inner" data-tilt="data-tilt" data-tilt-perspective="2000">
            <div class="menu">
                <ul>
                    <li>
                        <a href="portailInnov.php">Acceuil</a>
                    </li>
                    <li>
                        <a href="innovationNews.html">Innovation news</a>
                    </li>
                    <li>
                        <a href="carnet.html">Carnet de l'inventeur</a>
                    </li>
                    <li>
                        <a href="">Portail de l'inventeur</a>
                    </li>
                    <li>
                        <a href="">Ibtikarcom news</a>
                    </li>
                    <li>
                        <a href="">Guide de l'inventeur</a>
                    </li>
                </ul>
            </div>
            <!-- end menu -->
        </div>
        <!-- end inner -->
    </div>
    <!-- end navigation-menu -->
    <nav class="navbar">
        <div class="left">
            <a href="hello.html">Contact</a>
        </div>
        <!-- end left -->
        <div class="logo">
            <a href="portailInnov.php"><img src="assets_c2/images/logo.png" alt="Image"></a>
        </div>
        <!-- end logo -->
        <div class="right">
            <ul class="language">
                <li>
                    <a href="#"></a>
                </li>
                <li>
                    <a href="#"></a>
                </li>
            </ul>
            <div class="hamburger-menu">
                <b>MENU</b>
                <div class="hamburger" id="hamburger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <!-- end hamburger-menu -->
        </div>
        <!-- end right -->
    </nav>
    <!-- end navbar -->
    <header class="header">
        <aside class="left-side">
            <ul>
                <li>
                    <a href="#">FACEBOOK</a>
                </li>
                <li>
                    <a href="#">BEHANCE</a>
                </li>
                <li>
                    <a href="#">DRIBBBLE</a>
                </li>
            </ul>
        </aside>
        <!-- end left-side -->
        <div class="scroll-down">
            <small>SCROLL DOWN</small>
            <span></span></div>
        <!-- end scroll-down -->
        <div class="sound">
            <span>
                SOUND
            </span>
            <div class="equalizer">
                <div class="holder">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- end holder -->
            </div>
            <!-- end equalizer -->
        </div>
        <!-- end sound -->
        <div class="swiper-slider">
            <div class="swiper-wrapper">
                <?php  display_last_innovNews();  ?>
                <!-- end swiper-slide -->
            </div>
            <!-- end swiper-wrapper -->
            <div class="swiper-pagination"></div>
            <!-- end swiper-pagination -->
            <div class="swiper-fraction"></div>
            <!-- end swiper-fraction -->
        </div>
        <!-- end swiper-slider -->
    </header>
    <!-- end header -->
    <section class="works">
        <div class="container">
            <?php  display_portail_home(); ?>
        </div>
        <!-- end container -->
    </section>
    <!-- end works -->
    <section class="intro">
        <div class="container">
            <?php  display_last_carnet(); ?>
        </div>
        <!-- end container -->
    </section>
    <!-- end carnet -->
    <section class="works">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeIn">
                    <h6>Guide De L’inventeur</h6>
                    <h2 data-text="Guide">Un reportage en ligne présentés par des dirigeants
                        d’entreprises /Inve partager, orienter et de guider les jeunes innovateurs vers
                        le monde de l’entreprenariat.</h2>
                </div>
                <!-- end col-12 -->
                <div class="col-12">
                    <div class="project-box wow fadeIn" data-bg="#e7f3ff">
                        <figure>
                            <a href="images/featured02.jpg" data-fancybox="data-fancybox"><img src="images/featured02.jpg" alt="Image"></a>
                        </figure>
                        <div class="content-box">
                            <div class="inner">
                                <small>VERS LE MONDE DE L’ENTREPRENARIAT</small>
                                <h3>
                                    <span>Kyle</span>Watkins</h3>
                                <div class="custom-link">
                                    <a href="">
                                        <div class="lines">
                                            <span></span>
                                            <span></span>
                                        </div>
                                        <!-- end lines -->
                                        <b>Lire la vidéo</b>
                                    </a>
                                </div>
                                <!-- end custom-link -->
                            </div>
                            <!-- end inner -->
                        </div>
                        <!-- end content-box -->
                    </div>
                    <!-- end project-box -->
                    <div class="project-box wow fadeIn" data-bg="#e7f3ff">
                        <figure>
                            <a href="images/featured01.jpg" data-fancybox="data-fancybox"><img src="images/featured01.jpg" alt="Image"></a>
                        </figure>
                        <div class="content-box">
                            <div class="inner">
                                <small>VERS LE MONDE DE L’ENTREPRENARIAT</small>
                                <h3>
                                    <span>Kyle</span>Watkins</h3>
                                <div class="custom-link">
                                    <a href="">
                                        <div class="lines">
                                            <span></span>
                                            <span></span>
                                        </div>
                                        <!-- end lines -->
                                        <b>Lire la vidéo</b>
                                    </a>
                                </div>
                                <!-- end custom-link -->
                            </div>
                            <!-- end inner -->
                        </div>
                        <!-- end content-box -->
                    </div>
                    <!-- end project-box -->
                    <div class="project-box wow fadeIn" data-bg="#e7f3ff">
                        <figure>
                            <a href="images/featured02.jpg" data-fancybox="data-fancybox"><img src="images/featured02.jpg" alt="Image"></a>
                        </figure>
                        <div class="content-box">
                            <div class="inner">
                                <small>VERS LE MONDE DE L’ENTREPRENARIAT</small>
                                <h3>
                                    <span>Kyle</span>Watkins</h3>
                                <div class="custom-link">
                                    <a href="">
                                        <div class="lines">
                                            <span></span>
                                            <span></span>
                                        </div>
                                        <!-- end lines -->
                                        <b>Lire la vidéo</b>
                                    </a>
                                </div>
                                <!-- end custom-link -->
                            </div>
                            <!-- end inner -->
                        </div>
                        <!-- end content-box -->
                    </div>
                    <!-- end project-box -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end works -->
    <section class="work-with-us">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeIn">
                    <h6>IBTIKARCOM NEWS</h6>
                    <h2 data-text="Ibtikarcom news">DEVENIR EXPERT EN COMMUNICATION D’INFLUENCE</h2>
                </div>
                <!-- end col-12 -->
                <div class="col-lg-5 col-md-8 wow fadeIn">
                    <h4>Ruth Patel</h4>
                    <h4>Expert en communication</h4>
                    <div class="custom-link wow fadeIn">
                        <a href="#">
                            <div class="lines">
                                <span></span>
                                <span></span>
                            </div>
                            <!-- end lines -->
                            <b>Lire la vidéo</b>
                        </a>
                    </div>
                    <!-- end custom-link -->
                </div>
                <!-- end col-5 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <!-- end work-with-us -->
    <section class="clients">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 wow fadeIn">
                    <h6>START WORKING WITH US</h6>
                    <h2>Our clients</h2>
                    <h4>Do you have a project opportunity, or are you just a looking to get creative
                        solutions?</h4>
                    <div class="custom-link wow fadeIn">
                        <a href="#">
                            <div class="lines">
                                <span></span>
                                <span></span>
                            </div>
                            <!-- end lines -->
                            <b>BE OUR CLIENT</b>
                        </a>
                    </div>
                    <!-- end custom-link -->
                </div>
                <!-- end col-4 -->
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.10s">
                    <ul>
                        <li><img src="images/logo01.png" alt="Image">
                            <small>ABSTER</small>
                        </li>
                        <li><img src="images/logo02.png" alt="Image">
                            <small>LOKOMOTIVE</small>
                        </li>
                        <li><img src="images/logo03.png" alt="Image">
                            <small>BIRDIEST</small>
                        </li>
                        <li><img src="images/logo04.png" alt="Image">
                            <small>PLOCSHA</small>
                        </li>
                        <li><img src="images/logo05.png" alt="Image">
                            <small>NEWKY</small>
                        </li>
                        <li><img src="images/logo06.png" alt="Image">
                            <small>HACHAPURY</small>
                        </li>
                        <li><img src="images/logo02.png" alt="Image">
                            <small>LOKOMOTIVE</small>
                        </li>
                        <li><img src="images/logo05.png" alt="Image">
                            <small>NEWKY</small>
                        </li>
                    </ul>
                </div>
                <!-- end col-7 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end clients -->

    <?php include(TEMPLATE_FRONT . DS . "footerC2.php") ?>