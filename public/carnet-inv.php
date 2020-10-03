<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>

<header class="hero-headerCI">
<?php include(TEMPLATE_FRONT . DS . "navigationC2.php") ?>

<section class="carnet-inv">
    <h3 class="carnet-inv__title">
        Carnet de l’inventeur
    </h3>

    <div class="carnet-inv__wrapper" id="carnetContainer">

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
                    displaycarnet: "displaycarnet",
                    page: page
                },
                success: function (data) {     
                        $('#carnetContainer').html(data)
                    
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