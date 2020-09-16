<?php delete_2ai_news(); ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Manage your 2ai News members
                    <div class="page-title-subheading">here you can modify your 2ai News's information
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header"> 2ai New's list</div>
                <div class="table-responsive" id="aiNews_load">

                </div>
            </div>
        </div>
    </div>
</div>




<script>

    $(document).ready(function () {
        //showing the data without refresh but on going to the next pagination
        setTimeout(function () {
            load_fn_data();
        }, 1000);

        function load_fn_data(page) {
            $.ajax({
                url: "./ajaxCalls.php",
                method: "POST",
                data: {
                    page: page,
                    postpagination: "pagination"
                },
                success: function (data) {
                    $('#aiNews_load').html(data);
                }
            });
        }

        $(document).on('click', '.pagination_link', function () {
            var page = $(this).attr("id");
            load_fn_data(page);
        })
    })


    setTimeout(function(){
                    //to handle the deletion
            const delete_buttons = document.querySelectorAll('#deletebtn');
            for(const el of delete_buttons ){
                el.addEventListener('click', (e) => {
                let link = e.currentTarget.value;
                console.log(link);
                document.querySelector('.deletion_link').href = link;
                });
            }
    }, 1000);
</script>
