<?php update_ai_news()?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-wallet icon-gradient bg-plum-plate"> </i>
                </div>
                <div>
                Mettre à jour 2ai actualités
                    <div class="page-title-subheading">
                    En soumettant ce formulaire, vous mettrez à jour les informations de 2ai actualités
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    try {
        //code...
    
        $edit_ai_news_sql = "SELECT * FROM ai_news WHERE id = ?";
        $ai_news_edit = $pdo->prepare($edit_ai_news_sql);
        $ai_news_edit->execute([$_GET['edit_2AINewsC2']]);
        $ai_news_result = $ai_news_edit->fetchAll();
    ?>
    <div class="row justify-content-xl-center">
        <div class="col-md-8">
            <div class="main-card mb-2 card">
                <div class="card-body">
                    <h5 class="card-title">General Info</h5>
                    <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                    <?php if($ai_news_result): ?>
                        <?php foreach($ai_news_result as $ai_news): ?>
                        <div class="form-row">
                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Nom complet</label>
                                <input type="hidden" name="ai_news_id" value="<?php echo $ai_news->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le nom complet" name="full_name" value="<?php echo $ai_news->full_name ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Lien</label>
                                <input type="hidden" name="ai_news_id" value="<?php echo $ai_news->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le lien" name="link" value="<?php echo $ai_news->link ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Rôle</label>
                                <input type="hidden" name="ai_news_id" value="<?php echo $ai_news->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le rôle" name="role" value="<?php echo $ai_news->role ?>"  required=""/>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Titre</label>
                                <input type="hidden" name="ai_news_id" value="<?php echo $ai_news->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire le titre d'actualité" name="title" value="<?php echo $ai_news->title ?>"  required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFile" class="">File</label>
                                <!-- MAX_FILE_SIZE must precede the file input field -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                                <input type="hidden" name="cover_id" value="<?php echo $ai_news->cover?>">
                                <input name="cover" id="exampleFile" type="file" class="form-control-file">
                                <small class="form-text text-muted">Upload only if you want to replaced the existing image with a new one</small>
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