<?php update_team()?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-wallet icon-gradient bg-plum-plate"> </i>
                </div>
                <div>
                Mettre à jour les membres de l'équipe
                    <div class="page-title-subheading">
                    En soumettant ce formulaire, vous mettrez à jour les informations des membres de l'équipe
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    try {
        //code...
    
        $edit_team_sql = "SELECT * FROM team WHERE id = ?";
        $team_edit = $pdo->prepare($edit_team_sql);
        $team_edit->execute([$_GET['edit_team']]);
        $team_result = $team_edit->fetchAll();
    ?>
    <div class="row justify-content-xl-center">
        <div class="col-md-8">
            <div class="main-card mb-2 card">
                <div class="card-body">
                    <h5 class="card-title">General Info</h5>
                    <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                    <?php if($team_result): ?>
                        <?php foreach($team_result as $team): ?>
                        <div class="form-row">
                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Nom complet</label>
                                <input type="hidden" name="team_id" value="<?php echo $team->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le nom complet" name="full_name" value="<?php echo $team->full_name ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Rôle</label>
                                <input type="hidden" name="team_id" value="<?php echo $team->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le rôle" name="role" value="<?php echo $team->role ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Linkedin</label>
                                <input type="hidden" name="team_id" value="<?php echo $team->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Entrez son compte LinkedIn" name="linkedin" value="<?php echo $team->linkedin ?>" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Facebook</label>
                                <input type="hidden" name="team_id" value="<?php echo $team->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Entrez son compte Facebook" name="facebook" value="<?php echo $team->facebook ?>"  />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Instagram</label>
                                <input type="hidden" name="team_id" value="<?php echo $team->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Entrez son compte Instagram" name="instagram" value="<?php echo $team->instagram ?>"  />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>



                            <div class="col-md-6">
                                <label for="exampleFile" class="">Photo profile</label>
                                <!-- MAX_FILE_SIZE must precede the file input field -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                                <input type="hidden" name="cover_id" value="<?php echo $team->avatar?>">
                                <input name="avatar" id="exampleFile" type="file" class="form-control-file">
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