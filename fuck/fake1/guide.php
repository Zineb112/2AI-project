<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>


<header class="hero-headerGIP">
<?php include(TEMPLATE_FRONT . DS . "navigationC2.php") ?>
<section class="guideInv">
    <h3 class="guideInv__title">Guide De L’inventeur / Entrepreneur</h3>
    <div class="guideInv__wrapper" id="guideContainer">

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
                    displayGuide: "displayGuide",
                    page: page
                },
                success: function (data) {     
                        $('#guideContainer').html(data)
                    
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