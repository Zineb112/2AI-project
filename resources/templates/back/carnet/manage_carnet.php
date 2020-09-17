<?php delete_carnet(); ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Gérez vos carnet de l’inventeur
                    <div class="page-title-subheading">Ici vous pouvez voir les informations de carnet de l’inventeur
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Liste carnet de l’inventeur</div>
                <div class="table-responsive" id="carnet_load">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const delete_buttons = document.querySelectorAll('#PopoverCustomT-1');
    for(const el of delete_buttons ){
        el.addEventListener('click', (e) => {
        let link = e.currentTarget.value;
        document.querySelector('.deletion_link').href = link;
        });
    }
</script>


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
                    carnetpagination: "pagination"
                },
                success: function (data) {
                    $('#carnet_load').html(data);
                }
            });
        }

        $(document).on('click', '.pagination_link', function () {
            var page = $(this).attr("id");
            load_fn_data(page);
        })
    })


    // setTimeout(function(){
    //                 //to handle the deletion
    //         const delete_buttons = document.querySelectorAll('#deletebtn');
    //         for(const el of delete_buttons ){
    //             el.addEventListener('click', (e) => {
    //             let link = e.currentTarget.value;
    //             console.log(link);
    //             document.querySelector('.deletion_link').href = link;
    //             });
    //         }
    // }, 1000);
</script>
