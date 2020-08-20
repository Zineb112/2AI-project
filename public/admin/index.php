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

        // if(isset($_GET['create_partner'])){
        //     include(TEMPLATE_BACK . DS . "create_partner.php");
        // }

?>
















<?php include( TEMPLATE_BACK . DS . "footer.php" )?>