<?php update_guide()?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-wallet icon-gradient bg-plum-plate"> </i>
                </div>
                <div>
                Mettre à jour guide de l’Inventeur 
                    <div class="page-title-subheading">
                    En soumettant ce formulaire, vous mettrez à jour les informations du guide de l’Inventeur 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    try {
        //code...
    
        $edit_guide_sql = "SELECT * FROM guide WHERE id = ?";
        $guide_edit = $pdo->prepare($edit_guide_sql);
        $guide_edit->execute([$_GET['edit_guide']]);
        $guide_result = $guide_edit->fetchAll();
    ?>
    <div class="row justify-content-xl-center">
        <div class="col-md-8">
            <div class="main-card mb-2 card">
                <div class="card-body">
                    <h5 class="card-title">General Info</h5>
                    <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                    <?php if($guide_result): ?>
                        <?php foreach($guide_result as $guide): ?>
                        <div class="form-row">
                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Nom complet</label>
                                <input type="hidden" name="guide_id" value="<?php echo $guide->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le nom complet de l'inventeur" name="full_name" value="<?php echo $guide->full_name ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Rôle</label>
                                <input type="hidden" name="guide_id" value="<?php echo $guide->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le rôle de l'inventeur" name="role" value="<?php echo $guide->role ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Lien</label>
                                <input type="hidden" name="guide_id" value="<?php echo $guide->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le lien du reportage" name="link" value="<?php echo $guide->link ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Titre</label>
                                <input type="hidden" name="guide_id" value="<?php echo $guide->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le titre du reportage" name="title" value="<?php echo $guide->title ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="exampleFile" class="">Cover</label>
                                <!-- MAX_FILE_SIZE must precede the file input field -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                                <input type="hidden" name="cover_id" value="<?php echo $guide->cover?>">
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