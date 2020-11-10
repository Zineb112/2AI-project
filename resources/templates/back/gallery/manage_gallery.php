<?php delete_gallery(); ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Gérez vos photos/vidéos
                    <div class="page-title-subheading">Ici vous pouvez voir les informations de photo/vidéo
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Liste des photos/ vidéos</div>
                <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Couverture</th>
                                <th class="text-center">Titre</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Client</th>
                                <th class="text-center">Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php display_gallery_admin() ?>
                        </tbody>
                    </table>
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


