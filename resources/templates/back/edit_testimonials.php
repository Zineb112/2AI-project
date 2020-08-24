<?php update_testimonials()?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-wallet icon-gradient bg-plum-plate"> </i>
                </div>
                <div>
                    Update testimonials
                    <div class="page-title-subheading">
                        By submitting this form you will update testimonials client 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    try {
        //code...
    
        $edit_testimonials_sql = "SELECT * FROM testimonials WHERE id = ?";
        $testimonials_edit = $pdo->prepare($edit_testimonials_sql);
        $testimonials_edit->execute([$_GET['edit_testimonials']]);
        $testimonials_result = $testimonials_edit->fetchAll();
    ?>
    <div class="row justify-content-xl-center">
        <div class="col-md-8">
            <div class="main-card mb-2 card">
                <div class="card-body">
                    <h5 class="card-title">General Info</h5>
                    <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                    <?php if($testimonials_result): ?>
                        <?php foreach($testimonials_result as $tes): ?>
                        <div class="form-row">

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">full name</label>
                                <input type="hidden" name="testimonials_id" value="<?php echo $tes->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="full name" name="full_name" value="<?php echo $tes->full_name ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">descriptione</label>
                                <input type="hidden" name="testimonials_id" value="<?php echo $tes->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="description" name="description" value="<?php echo $tes->description ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3"> 
                                <label for="validationCustom01">role</label>
                                <input type="hidden" name="testimonials_id" value="<?php echo $tes->id?>">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="role" name="role" value="<?php echo $tes->role ?>" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="exampleFile" class="">File</label>
                                <!-- MAX_FILE_SIZE must precede the file input field -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                                <input type="hidden" name="cover_id" value="<?php echo $tes->profile?>">
                                <input name="profile" id="exampleFile" type="file" class="form-control-file">
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
            </div>
        </div>
    </div>

</div>