<?php update_faq()?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-wallet icon-gradient bg-plum-plate"> </i>
                </div>
                <div>
                Mettre à jour les FAQ's
                    <div class="page-title-subheading">
                    En soumettant ce formulaire, vous mettrez à jour les FAQ's
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    try {
        //code...
    
        $edit_partner_sql = "SELECT * FROM faq WHERE id = ?";
        $partner_edit = $pdo->prepare($edit_partner_sql);
        $partner_edit->execute([$_GET['edit_partner']]);
        $partner_result = $partner_edit->fetchAll();
    ?>
    <div class="row justify-content-xl-center">
        <div class="col-md-8">
            <div class="main-card mb-2 card">
                <div class="card-body">
                    <h5 class="card-title">General Info</h5>
                    <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                    <?php if($partner_result): ?>
                        <?php foreach($partner_result as $pr): ?>
                        <div class="form-row">
                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Question</label>
                                <input type="hidden" name="faq_id" value="<?php echo $pr->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire la question" name="question" value="<?php echo $pr->question ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">Reponse</label>
                                <input type="hidden" name="faq_id" value="<?php echo $pr->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Ici écrire la réponse" name="reponse" value="<?php echo $pr->reponse ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
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