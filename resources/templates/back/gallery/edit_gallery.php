<?php update_gallery()?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-wallet icon-gradient bg-plum-plate"> </i>
                </div>
                <div>
                Mettre à jour votre projets
                    <div class="page-title-subheading">
                    En soumettant ce formulaire, vous mettrez à jour les informations des projets
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    try {
        //code...
    
        $edit_gallery_sql = "SELECT * FROM project WHERE id = ?";
        $gallery_edit = $pdo->prepare($edit_gallery_sql);
        $gallery_edit->execute([$_GET['edit_gallery']]);
        $gallery_result = $gallery_edit->fetchAll();
    ?>
    <div class="row justify-content-xl-center">
        <div class="col-md-8">
            <div class="main-card mb-2 card">
                <div class="card-body">
                    <h5 class="card-title">General Info</h5>
                    <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                    <?php if($gallery_result): ?>
                        <?php foreach($gallery_result as $project): ?>
                        <div class="form-row">
                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Titre</label>
                                <input type="hidden" name="project_id" value="<?php echo $project->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le titre du projet" name="title" value="<?php echo $project->title ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">client</label>
                                <input type="hidden" name="project_id" value="<?php echo $project->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le nom du client" name="client" value="<?php echo $project->client ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <textarea name="content" id="editor">
                            <?php echo $project->content?>
                            </textarea>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Type</label>
                                <input type="hidden" name="project_id" value="<?php echo $project->id?>">
                                <select name="type" id="validationCustom01" value="<?php echo $project->type?>" required="">
                                <option value="images">Image</option>
                                <option value="video">Video</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="exampleFile" class="">Cover</label>
                                <!-- MAX_FILE_SIZE must precede the file input field -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                                <input type="hidden" name="cover_id" value="<?php echo $project->cover?>">
                                <input name="cover" id="exampleFile" type="file" class="form-control-file">
                                <small class="form-text text-muted">Télécharger uniquement si vous souhaitez remplacer l'image existante par une nouvelle</small>
                                <big class="form-text text-muted">&#9888; Les dimensions doivent être au moins de 800 x 800 px</big>
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