<?php require_once('./resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php") ?>
<?php include(TEMPLATE_FRONT . DS . "nav.php") ?>
        <div id="content" class="site-content">
            <div class="page-header flex-middle">
                <div class="container">
                    <div class="inner flex-middle">
                        <h1 class="page-title">Blog</h1>
                        <ul id="breadcrumbs" class="breadcrumbs none-style">
                            <li><a href="index.php">Acceuil</a></li>
                            <li class="active">Blog</li>
                        </ul>    
                    </div>
                </div>
            </div>
        </div>

        <div class="entry-content blog-mobile">
            <div class="container">
                <div class="blog-grid pgrid">
                    <div class="row" id="newsC1Container">

                    </div>
                </div>
                <!-- <div class="ot-button text-center">
                        <ul class="page-pagination none-style">
                                <li><a class="page-numbers" href="#">1</a></li>
                                <li><span aria-current="page" class="page-numbers current">2</span></li>
                                <li><a class="page-numbers" href="#">3</a></li>
                        </ul>
                </div> -->
            </div>
        </div>

        <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

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
                    displayNewsC1: "displayNewsC1",
                    page: page
                },
                success: function (data) {     
                        $('#newsC1Container').html(data)
                    
                }
            });
        }

        $(document).on('click', '.pagination_link', function () {
            var page = $(this).attr("id");
            load_fn_data(page);
        })
    })
</script>