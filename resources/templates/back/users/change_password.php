<?php change_password() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-wallet icon-gradient bg-plum-plate"> </i>
                </div>
                <div>
                    Change Password
                    <div class="page-title-subheading">
                        By submitting this form you will change your password
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-xl-center">
        <div class="col-md-6">
            <div class="main-card mb-2 card">
                <div class="card-body">
                    <h5 class="card-title">Change Password</h5>
                    <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
                        <div class="form-row">
                            <div class="col-md-10 mb-3">
                                <label for="validationCustom01">Current Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="validationCustom01"
                                        placeholder="Current password" name="current-password" required="" />
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info eyeicon">
                                            <i class="fa fa-eye-slash"></i>
                                        </button>
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 mb-3">
                                <label for="validationCustom02">new password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" pattern="^(?=.*\d).{4,8}$" id="newPass"
                                        placeholder="New password" name="new-password" required="" />
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info eyeicon">
                                            <i class="fa fa-eye-slash"></i>
                                        </button>
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Password expression. Password must be between 4 and 8 digits
                                        long and include at least one numeric digit.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 mb-3">
                                <label for="validationCustom02">confirm new password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" pattern="^(?=.*\d).{4,8}$"
                                        id="CFnewPass" placeholder="confirm password" name="confirm-password"
                                        required="" />
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info eyeicon">
                                            <i class="fa fa-eye-slash"></i>
                                        </button>
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Password expression. Password must be between 4 and 8 digits
                                        long and include at least one numeric digit.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input class="btn btn-primary" id="submit_event" type="submit" name="submit"
                            value="Submit form" />
                    </form>
                </div>

                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function () {
                        "use strict";
                        var password = document.querySelector("#newPass");
                        var confirmPassword = document.querySelector("#CFnewPass");
                        document.querySelector("form").addEventListener(
                            "submit",
                            (e) => {
                                if (password.value != confirmPassword.value) {
                                    toastr.error("passwords don't match", "Error");
                                    confirmPassword.setCustomValidity("Invalid field.");
                                    e.preventDefault();
                                    e.stopPropagation();
                                } else {
                                    confirmPassword.setCustomValidity("");
                                }
                            },
                            false
                        );
                    })();
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


                    let showpassword = (() => {
                        let eyeTg = document.querySelectorAll('.eyeicon');
                        for (let eye of eyeTg) {
                            eye.addEventListener('click', (e)=>{
                            eye.classList.toggle('btn-info');
                            eye.classList.toggle('btn-success');
                            eye.children[0].classList.toggle('fa-eye-slash');
                            eye.children[0].classList.toggle('fa-eye');
                            if(eye.parentNode.parentNode.children[0].type === "text"){
                                eye.parentNode.parentNode.children[0].type = "password";
                            } else if(eye.parentNode.parentNode.children[0].type === "password" ){
                                eye.parentNode.parentNode.children[0].type = "text";
                            }
                            
                            

                        });
                        }

                    })()
                </script>
            </div>
        </div>
    </div>
</div>