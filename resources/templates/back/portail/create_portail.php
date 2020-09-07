
<?php 
submit_portail();

?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-wallet icon-gradient bg-plum-plate"> </i>
                </div>
                <div>
                    Add new portail
                    <div class="page-title-subheading">
                        By submitting this form you will create a new inventor
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="" data-placement="bottom"
                    class="btn-shadow mr-3 btn btn-dark" data-original-title="Example Tooltip">
                    <i class="fa fa-star"></i>
                </button>

            </div>
        </div>
    </div>
    <div class="row justify-content-xl-center">
        <div class="col-md-8">
            <div class="main-card mb-2 card">
                <div class="card-body">
                    <h5 class="card-title">New inventor</h5>
                    <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">full name</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="full name" name="full_name"  required=""  />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Role</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Enter inventor role" name="role"  />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">link</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="video link" name="link" required="" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                          

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Title</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Enter inventor title " name="title" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                           

                            <div class="col-md-6">
                                <label for="exampleFile" class="">File</label>
                                        <!-- MAX_FILE_SIZE must precede the file input field -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                                <input name="cover" id="exampleFile" type="file" class="form-control-file">
                                <big class="form-text text-muted">&#9888; The dimensions must be 500 x 500 px at least</big>
                            </div>
                        </div>
                        <input class="btn btn-primary" id="submit_portail" type="submit" name="submit" value="Submit form">
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