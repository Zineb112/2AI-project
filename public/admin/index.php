<?php 
require_once('../../resources/config.php');
include("user_auth.php");
include(TEMPLATE_BACK . DS . "head.php");
?>

<?php include(TEMPLATE_BACK . DS . "nav.php") ?>
<?php include(TEMPLATE_BACK . DS . "ui_settings.php") ?>

<div class="app-main">
    <?php include(TEMPLATE_BACK . DS . "sidebar.php") ?>
    <div class="app-main__outer">

        <?php 
        $access_admin = 1;
        $access_editor = 2;
        $access_viewer = 3;
        if($_SERVER['REQUEST_URI'] == "/admin/" || $_SERVER['REQUEST_URI'] == "/admin/index.php?loginSuccess" || $_SERVER['REQUEST_URI'] == "/admin/index.php"){
            include(TEMPLATE_BACK . DS . "dashboard.php") ;
        }

        // 2ai News requests
        if(isset($_GET['create_2AINewsC2'])){
            include(TEMPLATE_BACK . DS . "2aiNewsC2/create_2AINewsC2.php");
        }
        if(isset($_GET['manage_2AINewsC2'])){
            include(TEMPLATE_BACK . DS . "2aiNewsC2/manage_2AINewsC2.php");
        }
        if(isset($_GET['edit_2AINewsC2'])){
            include(TEMPLATE_BACK . DS . "2aiNewsC2/edit_2AINewsC2.php");
        }

        // Gallery requests
        if(isset($_GET['create_gallery'])){
            include(TEMPLATE_BACK . DS . "gallery/create_gallery.php");
        }
        if(isset($_GET['manage_gallery'])){
            include(TEMPLATE_BACK . DS . "gallery/manage_gallery.php");
        }
        if(isset($_GET['edit_gallery'])){
            include(TEMPLATE_BACK . DS . "gallery/edit_gallery.php");
        }
    
        
        // Innovation news requests
        if(isset($_GET['create_innov-news'])){
            include(TEMPLATE_BACK . DS . "innovationNews/create_innov-news.php");
        }
        if(isset($_GET['manage_innov-news'])){
            include(TEMPLATE_BACK . DS . "innovationNews/manage_innov-news.php");
        }
        if(isset($_GET['edit_innov-news'])){
            include(TEMPLATE_BACK . DS . "innovationNews/edit_innov-news.php");
        }

        //Inventor's guide requets
        if(isset($_GET['create_guide'])){
            include(TEMPLATE_BACK . DS . "guide/create_guide.php");
        }
        if(isset($_GET['manage_guide'])){
            include(TEMPLATE_BACK . DS . "guide/manage_guide.php");
        }
        if(isset($_GET['edit_guide'])){
            include(TEMPLATE_BACK . DS . "guide/edit_guide.php");
        }

        // Team requests
        if(isset($_GET['create_team'])){
            include(TEMPLATE_BACK . DS . "team/create_team.php");
        }
        if(isset($_GET['manage_team'])){
            include(TEMPLATE_BACK . DS . "team/manage_team.php");
        }
        if(isset($_GET['edit_team'])){
            include(TEMPLATE_BACK . DS . "team/edit_team.php");
        }

        // Partner requests
        if(isset($_GET['create_partner'])){
        include(TEMPLATE_BACK . DS . "partners/create_partner.php");
        }
        if(isset($_GET['manage_partner'])){
        include(TEMPLATE_BACK . DS . "partners/manage_partner.php");
        }
        if(isset($_GET['edit_partner'])){
        include(TEMPLATE_BACK . DS . "partners/edit_partner.php");
        }

        // Testimonials requests
        if(isset($_GET['create_testimonials'])){
        include(TEMPLATE_BACK . DS . "testimonials/create_testimonials.php");
        }
        if(isset($_GET['manage_testimonials'])){
        include(TEMPLATE_BACK . DS . "testimonials/manage_testimonials.php");
        }
        if(isset($_GET['edit_testimonials'])){
        include(TEMPLATE_BACK . DS . "testimonials/edit_testimonials.php");
        }
        
        
        // portail requests
        if(isset($_GET['create_portail'])){
        include(TEMPLATE_BACK . DS . "portail/create_portail.php");
        }
        if(isset($_GET['manage_testimonials'])){
        include(TEMPLATE_BACK . DS . "portails/manage_portail.php");
        }
        if(isset($_GET['edit_testimonials'])){
        include(TEMPLATE_BACK . DS . "portail/edit_portail.php");
        }


        // Users requests
        if(isset($_GET['change_pass'])){
            include(TEMPLATE_BACK . DS . "users/change_password.php");
        }
        if(isset($_GET['add_user'])){
            $_SESSION['access'] == $access_admin ?  include(TEMPLATE_BACK . DS . "users/add_user.php"):  include(TEMPLATE_BACK . DS . "notAuth.php") ;
        }
        if(isset($_GET['manage_users'])){
            $_SESSION['access'] == $access_admin ?  include(TEMPLATE_BACK . DS . "users/manage_users.php"):  include(TEMPLATE_BACK . DS . "notAuth.php") ;
        }
        if(isset($_GET['edit_user'])){
            $_SESSION['access'] == $access_admin ?  include(TEMPLATE_BACK . DS . "users/edit_user.php"):  include(TEMPLATE_BACK . DS . "notAuth.php") ;
        }


        // Carnet requests
        if(isset($_GET['create_carnet'])){
            include(TEMPLATE_BACK . DS . "carnet/create_carnet.php");
        }
        if(isset($_GET['manage_carnet'])){
            include(TEMPLATE_BACK . DS . "carnet/manage_carnet.php");
        }
        if(isset($_GET['edit_carnet'])){
            include(TEMPLATE_BACK . DS . "carnet/edit_carnet.php");
        }





?>

        <?php include( TEMPLATE_BACK . DS . "footer.php" )?>