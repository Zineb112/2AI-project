<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>
<header class="hero-headerIN">

<?php include(TEMPLATE_FRONT . DS . "navigationC2.php") ?>


<section class="innov-newsP">
    <h3 class="innov-newsP__title">
        Innovation News
    </h3>
    <div class="innov-newsP__wrapper" id="innovContainer">
     
    </div>
</section>

</header>


<script>
    $(document).ready(function () {
        //showing the data without refresh but on going to the next pagination
        console.log('start');
        setTimeout(function () {
            load_fn_data();
            
        }, 1000);

        function load_fn_data(page) {
            $.ajax({
                url: "./ajaxCalls.php",
                method: "POST",
                data: {
                    displayInnov: "displayInnov",
                    page: page
                },
                success: function (data) {     
                        $('#innovContainer').html(data)
                    
                }
            });
        }

        $(document).on('click', '.pagination_link', function () {
            var page = $(this).attr("id");
            load_fn_data(page);
        })
    })
</script>

<?php include(TEMPLATE_FRONT . DS . "newsletterC2.php") ?>
<?php include(TEMPLATE_FRONT . DS . "footerC2.php") ?>
<?php include(TEMPLATE_FRONT . DS . "end.php") ?>