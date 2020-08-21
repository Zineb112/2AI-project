<?php add_users();?>
<div class="app-main__inner">
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-graph text-success"> </i>
      </div>
      <div>
        Add Employees
        <div class="page-title-subheading">
          Register new employee
        </div>
      </div>
    </div>
  </div>
</div>
<form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
  <div class="main-card mb-3 card">
    <div class="card-body">
      <h5 class="card-title">Personal information</h5>

      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="validationCustom01">First name</label>
          <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="name" value=""
            required="" />
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationCustom02">Last name</label>
          <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" name="last-name"
            value="" required="" />
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>

      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom03">Phone number</label>
          <input type="tel" name="phone" pattern="(\+212|0)([ \-_/]*)(\d[ \-_/]*){9}" class="form-control"
            id="validationCustom03" placeholder="phone number"  />
          <div class="invalid-feedback">
            Please provide a valid phone number
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="validationCustom02">Profile image</label>
        <!-- MAX_FILE_SIZE must precede the file input field -->
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
        <input name="profile_pic" id="exampleFile" type="file" class="form-control-file" />
        <div class="valid-feedback">
          File added succefully
        </div>
        <div class="invalid-feedback">
          Please uplaod a file
        </div>
      </div>



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

  <div class="main-card mb-3 card">
    <div class="card-body">
      <h5 class="card-title">professional information</h5>

      <div class="position-relative row form-group">
        <label for="validationCustomUsername" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend">@</span>
            </div>
            <input type="text" class="form-control" name="username" id="validationCustomUsername" placeholder="Username"
              aria-describedby="inputGroupPrepend" required="">
            <div class="invalid-feedback">
              Please choose a username.
            </div>
          </div>
        </div>
      </div>
      <div class="position-relative row form-group">
        <label for="examplePassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input name="password" id="examplePassword" pattern='^(?=.*\d).{4,8}$' placeholder="Password (8 characters minimum)"
            type="password" class="form-control" required />
            <div class="invalid-feedback">
               Password expression. Password must be between 4 and 8 digits long and include at least one numeric digit.
            </div>
        </div>
      </div>
      <div class="position-relative row form-group">
        <label for="UserService" class="col-sm-2 col-form-label">Access right</label>
        <div class="col-sm-10">
          <select name="access_right" id="UserService" class="form-control">

            <option value=2 >Editor</option>
            <option value=1 >admin</option>
            <option value=3 >viewer</option>

          </select>
        </div>
      </div>
      <div class="position-relative row form-group">
        <label for="useremail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input name="email" id="useremail" placeholder="username@congeeapp.com" type="email" class="form-control"
            required />
          <div class="invalid-feedback">
            Please choose a valid email
          </div>
        </div>
      </div>


      <div class="position-relative row form-group">
        <label for="UserService" class="col-sm-2 col-form-label">department</label>
        <div class="col-sm-10">
          <select name="service" id="UserService" class="form-control">

            <?php display_service_in_form()?>

          </select>
        </div>
      </div>

      <div class="position-relative row form-group">
        <label for="userole" class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
          <input name="role" id="userole" placeholder="data analyst" type="text" class="form-control" required />
          <div class="invalid-feedback">
            Please choose a valid role
          </div>
        </div>
      </div>
      <div class="position-relative row form-group">
        <label for="userpto" class="col-sm-2 col-form-label">sold conge (PTO)</label>
        <div class="col-sm-10">
          <input name="pto" id="userpto" placeholder="20 (paid time off)" type="number" class="form-control" required />
          <div class="invalid-feedback">
            Please choose a valid number
          </div>
        </div>
      </div>
      <div class="position-relative row ">
        <div class="col-sm-10 ">
          <input type="submit" class="btn btn-primary" value="submit" name="submit"
            style="width: 12rem; margin-top: 1rem;">
        </div>
      </div>
    </div>
  </div>
</form>
</div>