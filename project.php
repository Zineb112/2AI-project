<?php require_once('./resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php") ?>
<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>

<div id="content" class="site-content">
    <div class="page-header flex-middle">
        <div class="container">
            <div class="inner flex-middle">
                <h1 class="page-title">Projets</h1>
                <ul id="breadcrumbs" class="breadcrumbs none-style">
                    <li>
                        <a href="index.php">Acceuil</a>
                    </li>
                    <li class="active">Projets</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="portfolio-single">
                <div class="container">

                <?php display_single_project() ?>



                    <div class="row">
                        <div class="col-md-12">
                            <div class="post-nav single-portfolio-navigation mt-5 clearfix">
                            <div class="project-ralate">
                                <h2>Related Projects</h2>
                                <div class="row projects-style-1 justify-content-center">
                                    <?php display_project_three() ?>
                                </div>
                            </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </section>

</div>

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>