<?php update_portail()?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-wallet icon-gradient bg-plum-plate"> </i>
                </div>
                <div>
                Mettre à jour les informations des portail de l’Innovateur
                    <div class="page-title-subheading">
                    En soumettant ce formulaire, vous mettrez à jour les informations des portail de l’Innovateur
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    try {
        //code...
    
        $edit_portail_sql = "SELECT * FROM portail WHERE id = ?";
        $portail_edit = $pdo->prepare($edit_portail_sql);
        $portail_edit->execute([$_GET['edit_portail']]);
        $portail_result = $portail_edit->fetchAll();
    ?>
    <div class="row justify-content-xl-center">
        <div class="col-md-8">
            <div class="main-card mb-2 card">
                <div class="card-body">
                    <h5 class="card-title">General Info</h5>
                    <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                    <?php if($portail_result): ?>
                        <?php foreach($portail_result as $portail): ?>
                        <div class="form-row">
                        <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Titre du capsule</label>
                                <input type="hidden" name="portail_id" value="<?php echo $portail->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le titre" name="title" value="<?php echo $portail->title ?>" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Nom complet</label>
                                <input type="hidden" name="portail_id" value="<?php echo $portail->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le nom complet de l’Innovateur" name="full_name" value="<?php echo $portail->full_name ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Lien</label>
                                <input type="hidden" name="portail_id" value="<?php echo $portail->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le lien" name="link" value="<?php echo $portail->link ?>" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                     

                            <div class="col-md-6">
                                <label for="exampleFile" class="">Cover</label>
                                <!-- MAX_FILE_SIZE must precede the file input field -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                                <input type="hidden" name="cover_id" value="<?php echo $portail->cover?>">
                                <input name="cover" id="exampleFile" type="file" class="form-control-file">
                                <small class="form-text text-muted">Télécharger uniquement si vous souhaitez remplacer l'image existante par une nouvelle</small>
                            </div>
                        </div>
                        <input class="btn btn-primary" id="submit_event" type="submit" name="submit" value="Submit form">
                        
                        <?php endforeach ?>
                    <?php endif ?>
                    <?php 
                        }  catch (PDOException $e) {
                            echo 'query failed' . $e->getMessage();
                        }
                    ?>
                    </form>
        
                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function () {
                            "use strict";
                            window.addEventListener(
                                "load",
                                function () {
                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.getElementsByClassName("needs-validation");
                                    // Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(forms, function (
                                        form
                                    ) {
                                        form.addEventListener(
                                            "submit",
                                            function (event) {
                                                if (form.checkValidity() === false) {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }
                                                form.classList.add("was-validated");
                                            },
                                            false
                                        );
                                    });
                                },
                                false
                            );
                        })();
                    </script>
                </div>
            </div>
        </div>
    </div>

</div>