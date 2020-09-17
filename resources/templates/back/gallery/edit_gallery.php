<?php update_gallery()?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-wallet icon-gradient bg-plum-plate"> </i>
                </div>
                <div>
                Mettre à jour galerie
                    <div class="page-title-subheading">
                    En soumettant ce formulaire, vous mettrez à jour les informations des photos/ vidéos
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    try {
        //code...
    
        $edit_gallery_sql = "SELECT * FROM gallery WHERE id = ?";
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
                        <?php foreach($gallery_result as $gallery): ?>
                        <div class="form-row">
                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Titre</label>
                                <input type="hidden" name="gallery_id" value="<?php echo $gallery->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le titre du iamge/vidéo" name="title" value="<?php echo $gallery->title ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Catégorie</label>
                                <input type="hidden" name="gallery_id" value="<?php echo $gallery->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire la catégorie" name="category" value="<?php echo $gallery->category ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                         

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Lien</label>
                                <input type="hidden" name="gallery_id" value="<?php echo $gallery->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le lien du l'image/vidéo" name="link" value="<?php echo $gallery->link ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Type</label>
                                <input type="hidden" name="gallery_id" value="<?php echo $gallery->id?>">
                                <select name="type" id="validationCustom01" value="<?php echo $gallery->type?>" required="">
                                <option value="images">Image</option>
                                <option value="video">Video</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="exampleFile" class="">File</label>
                                <!-- MAX_FILE_SIZE must precede the file input field -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                                <input type="hidden" name="cover_id" value="<?php echo $gallery->cover?>">
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