<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>
<?php include(TEMPLATE_FRONT . DS . "header_home.php") ?>
<?php include(TEMPLATE_FRONT . DS . "serviceSection.php") ?>
<?php include(TEMPLATE_FRONT . DS . "objectives.php") ?>
<?php include(TEMPLATE_FRONT . DS . "invportailSection.php") ?>
<?php include(TEMPLATE_FRONT . DS . "gallerySection.php") ?>
<?php include(TEMPLATE_FRONT . DS . "contactSection.php") ?>
<?php include(TEMPLATE_FRONT . DS . "newsSection.php") ?>
<?php include(TEMPLATE_FRONT . DS . "testimonials.php") ?>
<?php include(TEMPLATE_FRONT . DS . "partners.php") ?>
<?php include(TEMPLATE_FRONT . DS . "newsletter.php") ?>
<?php include(TEMPLATE_FRONT . DS . "end.php") ?>


<script>
        $('#play-video').on('click', function(e){
          e.preventDefault();
          $('#video-overlay').addClass('open');
          $("#video-overlay").append('<iframe width="80%" height="80%" src="../images/about2AI.mp4" frameborder="0" allowfullscreen></iframe>');
        });
        
        $('.video-overlay, .video-overlay-close').on('click', function(e){
          e.preventDefault();
          close_video();
        });
        
        $(document).keyup(function(e){
          if(e.keyCode === 27) { close_video(); }
        });
        
        function close_video() {
          $('.video-overlay.open').removeClass('open').find('iframe').remove();
};</script>

<script>

var typed = new Typed(".sub-heading", {
  strings: [
    
    'Makes your Innovation Known',
    'Makes your Innovation Known',
    ],
    loop: true,
    loopCount: Infinity,
    smartBackspace: true,
    typeSpeed: 40,
    backSpeed: 40,
});

</script>