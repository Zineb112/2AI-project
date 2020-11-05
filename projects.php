<?php require_once('./resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php") ?>
<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>

        <div id="content" class="site-content">
            <div class="page-header flex-middle">
                <div class="container">
                    <div class="inner flex-middle">
                        <h1 class="page-title">Projets</h1>
                        <ul id="breadcrumbs" class="breadcrumbs none-style">
                            <li><a href="index.php">Accueil</a></li>
                            <li class="active">Projets</li>
                        </ul>    
                    </div>
                </div>
            </div>
            <section class="projects-masonry">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="ot-heading">
                                <span>// latest case studies</span>
                                <h2 class="main-heading">Nos Projets</h2>
                            </div>
                            <div class="space-5"></div>
                            <p class="projectspara">Identités visuelles impactantes, sites internet, accompagnements en marketing digital, shooting photo, évènementielle et presse... <br> Un cocktail de réactivité, créativité et passion au service de nos clients, à découvrir</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="project-filter-wrapper">
                                <ul class="project_filters">
                                    <li><a href="#" data-filter="*" class="selected">Tous</a></li>
                                    <li><a href="#" data-filter=".design">Design</a></li>                       
                                    <li><a href="#" data-filter=".development">Development</a></li>                     
                                    <li><a href="#" data-filter=".ideas">Ideas</a></li>                     
                                    <li><a href="#" data-filter=".technology">Technology</a></li>                       
                                </ul>
                                <div class="projects-grid projects-style-1 projects-col3">
                                <?php display_gallery() ?>  
                                    </div>
                            </div>
                            <!-- <div class="space-60"></div>
                            <div class="ot-button text-center">
                                <a href="portfolio-grid.html" class="octf-btn octf-btn-primary">Load More</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </section>

        </div>

<?php include(TEMPLATE_FRONT . DS . "partners.php") ?>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>