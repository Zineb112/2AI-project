<?php require_once('./resources/config.php'); ?>
<?php include(TEMPLATE_FRONT . DS . "headC2.php") ?>

<body>
    <div class="preloader">
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="inner">
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
                        <a href="innovationNews.php">Innovation news</a>
                    </li>
                    <li>
                        <a href="carnet.php">Carnet de l'inventeur</a>
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
    <nav class="navbar">
        <div class="left">
            <a href="contactC2.php">Contact</a>
        </div>
        <!-- end left -->
        <div class="logo">
            <a href="index.php"><img src="assets_c2/images/logo.png" alt="Ibtikarcom logo"></a>
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
    <header class="page-header">
        <div class="video-bg">
            <video src="videos/video2.mp4" muted="muted" loop="loop" autoplay="autoplay"></video>
        </div>
        <!-- end video-bg -->
        <div class="container">
            <h1>CARNET DE L'INVENTEUR</h1>
            <p>TO CREATE A POWERFUL PROJECT ONCE, A BIT OF LUCK IS ENOUGH</p>
        </div>
        <!-- end container -->
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
    </header>
    <section class="news">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php  display_carnet(); ?>
                </div>
            </div>
        </div>
    </section>

<?php include(TEMPLATE_FRONT . DS . "footerC2.php") ?>