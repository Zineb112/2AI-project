<?php require_once('../resources/config.php'); ?>


<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>
<header class="hero-headerP">
<?php include(TEMPLATE_FRONT . DS . "navigationC2.php") ?>
<section class="portailIP">
    <h3 class="portailIP__title">
        Portail De L'inventeur
    </h3>
    <div class="portailIP__wrapper" id="portailContainer">

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
                    displayPortail: "displayPortail",
                    page: page
                },
                success: function (data) {     
                        $('#portailContainer').html(data)
                    
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