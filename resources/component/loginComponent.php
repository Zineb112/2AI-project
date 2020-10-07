<?php
function login_users()
{
    global $pdo;
    if (isset($_POST['login'])) {
        try {
            $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
            $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
            $sql = "SELECT u.*, m.file_name FROM users u JOIN media m on u.avatar = m.id WHERE u.username = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$username]);
            $user = $stmt->fetch();
            
            if (empty($user)) {
                set_message('error','Incorrect username or password combination !');
                redirect('./login.php');
                exit;
            }
            if($user->status == 0){
                set_message('error','You are inactive, contact the admin');
                redirect('./login.php');
                exit;
            }
            
            if (MD5($passwordAttempt) === $user->password_hash) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['full_name'] = $user->name . " " . $user->last_name;
                $_SESSION['profile_pic'] = $user->file_name;
                $_SESSION['username'] = $user->username;
                $_SESSION['role'] = $user->role;
                $_SESSION['access'] = $user->access_right;
                $_SESSION['logged_in'] = time();
                redirect('/admin/index.php?loginSuccess');
                exit;
            } else {
                set_message('error','Incorrect username or password combination! try again ');
                redirect('./login.php');
                exit;
            }
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
          }


    }
}


function successful_login_notification(){
  if(isset($_GET['loginSuccess'])){
    set_message('success', 'successful login');
    display_msg();
    } 
}

function forgot_password(){
    global $pdo;
    if(isset($_POST['forgot_email'])){
        try {
           //Get the name that is being searched for.
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
 
            //The simple SQL query that we will be running. (named paramters)
            $sql = "SELECT `id`, `email` FROM `users` WHERE `email` = :email";
            //Prepare our SELECT statement.
            $statement = $pdo->prepare($sql);
            //Execute the SQL statement.
            $statement->execute(['email'=>$email]);
            
            //Fetch our result as an associative array.
            $userInfo = $statement->fetch(PDO::FETCH_ASSOC);
            
            //If $userInfo is empty, it means that the submitted email
            //address has not been found in our users table.
            if(empty($userInfo)){
                echo "<script>toastr.error('That email address was not found in our system!', 'Error');</script>";
                exit;
            }
            
            //The user's email address and id.
            $userEmail = $userInfo['email'];
            $userId = $userInfo['id'];
            
            //Create a secure token for this forgot password request.
            $token = openssl_random_pseudo_bytes(16);
            $token = bin2hex($token);
            
            //Insert the request information
            //into our password_reset_request table.
            
            //The SQL statement.
            $insertSql = "INSERT INTO password_reset_request
                        (user_id, date_requested, token)
                        VALUES
                        (:user_id, :date_requested, :token)";
            
            //Prepare our INSERT SQL statement.
            $statement = $pdo->prepare($insertSql);
            
            //Execute the statement and insert the data.
            $statement->execute(array(
                "user_id" => $userId,
                "date_requested" => date("Y-m-d H:i:s"),
                "token" => $token
            ));
            
            //Get the ID of the row we just inserted.
            $passwordRequestId = $pdo->lastInsertId();
            
            
            //Create a link to the URL that will verify the
            //forgot password request and allow the user to change their
            //password.
            $verifyScript = 'https://ibtikarcom.com/forgot-pass.php';
            
            //The link that we will send the user via email.
            $linkToSend = $verifyScript . '?uid=' . $userId . '&id=' . $passwordRequestId . '&t=' . $token;
            $message = <<<msg
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    
    <head></head>
    
    <body>
        <style></style>
        <spacer size="16"></spacer>
        <container>
            <row class="header" style="background:#6C6C6C">
                <columns>
                    <spacer size="16"></spacer>
                </columns>
            </row>
            <row>
                <columns>
                    <spacer size="32"></spacer>
                    <center>
                        <svg height="100px" width="101px" xmlns="http://www.w3.org/2000/svg" class="logo-icon" version="1.1" viewBox="0 0 143, 142">
                            <g>
                                <g fill="#F0BD1D" transform="translate(34.148472, 0.000000)">
                                    <path d="M108.371179,70.9 C108.371179,31.8 76.4323144,0.1 37.1615721,0.1 L37.1615721,10.4 C46.6026201,10.4 55.5414847,12.5 63.5764192,16.4 C66.1877729,17.7 68.7991266,19.1 71.209607,20.8 C75.2270742,23.5 78.9432314,26.7 82.2576419,30.3 C83.5633188,31.7 84.768559,33.2 85.9737991,34.8 C87.6812227,37.1 89.2882096,39.6 90.6943231,42.2 C92.1004367,44.8 93.3056769,47.5 94.3100437,50.2 C96.720524,56.7 98.0262009,63.7 98.0262009,71 L98.0262009,71.1 L108.371179,70.9 C108.371179,71 108.371179,70.9 108.371179,70.9 L108.371179,70.9 L108.371179,70.9 Z"></path>
                                    <path d="M37.1615721,73.1 C16.6724891,73.1 0,89.7 0,110.1 L0,111.3 C9.84279476,120.3 22.7991266,125.7 37.1615721,125.7 C51.5240175,125.7 64.4803493,120.2 74.3231441,111.3 L74.3231441,110.1 C74.3231441,89.7 57.650655,73.1 37.1615721,73.1 L37.1615721,73.1 L37.1615721,73.1 Z"></path>
                                    <ellipse cx="37.1615721" cy="48.2" rx="20.3886463" ry="20.3"></ellipse>
                                </g>
                                <path d="M132.074236,74.1 C131.873362,77.2 131.572052,80.2 130.868996,83.2 C130.668122,84.2 130.467249,85.2 130.165939,86.1 C129.663755,88 129.061135,89.9 128.358079,91.8 C127.353712,94.6 126.148472,97.3 124.742358,99.8 C123.336245,102.4 121.729258,104.8 120.021834,107.2 C108.873362,122 91.1965066,131.5 71.209607,131.5 C48.1091703,131.5 28.0218341,118.7 17.6768559,99.8 C12.9563319,91.2 10.3449782,81.4 10.3449782,70.9 L10.3449782,70.8 C10.3449782,61.9 12.3537118,53.4 15.768559,45.8 C16.371179,44.5 16.9737991,43.2 17.6768559,42 C18.580786,40.3 19.5851528,38.6 20.6899563,37 C22.8995633,33.8 25.4104803,30.8 28.1222707,28 C30.8340611,25.3 33.8471616,22.8 37.1615721,20.6 C38.768559,19.5 40.4759825,18.5 42.1834061,17.6 C43.3886463,16.9 44.6943231,16.3 46,15.7 C53.6331878,12.2 62.1703057,10.3 71.209607,10.3 L71.209607,0 C31.9388646,0 0.100436681,31.7 0,70.8 L0,70.9 C0,110 31.8384279,141.8 71.209607,141.8 C110.580786,141.8 142.419214,110.1 142.419214,70.9 L132.074236,70.9 C132.174672,72 132.174672,73.1 132.074236,74.1 L132.074236,74.1 L132.074236,74.1 Z" fill="#207C9D"></path>
                            </g>
                        </svg>
                    </center>
                    <spacer size="16"></spacer>
                    <h1 class="text-center" style="color:#01252F;font-family:Lato,sans-serif;font-size:30pt;text-align:center">Forgot Your Password?</h1>
                    <spacer size="16"></spacer>
                    <p class="textcenter" style="font-family:Lato,sans-serif;text-align:center">It happens. Click the link below to reset your password.</p>
                    <a href="{$linkToSend}" style="align-items: center;font-family:Lato,sans-serif;height:50px;width:200px;display: block;margin: 2rem auto;text-decoration: none;background: #10B099;padding: 1.5rem .5rem 0;text-align: center;border-radius: 5px;color: white;font-size: 16px;font-weight: 500;" data-mt-detrack-inspected="true" data-mt-detrack-attachment-inspected="true">RESET PASSWORD</a>
                    <p class="textcenter" style="font-family:Lato,sans-serif;text-align:center">If you did not request your password, please let us know immediately by replying to this email.</p>
                    <p style="font-family:Lato,sans-serif"></p>
                </columns>
            </row>
            <table class="headerbody" style="margin:10px 0 100px 0">
                <tbody>
                    <tr>
                        <td style="box-sizing:border-box;font-family:Arial,\'Helvetica Neue\',Helvetica,sans-serif;word-break:break-word">
    
            <spacer size="16"></spacer>
        </container>
    </body>
    </html>
msg;
        send_email($message, $userEmail);
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}


function change_pass() {
    global $pdo;
    try {
            //The user's id, which should be present in the GET variable "uid"
            $userId = isset($_GET['uid']) ? trim($_GET['uid']) : '';
            //The token for the request, which should be present in the GET variable "t"
            $token = isset($_GET['t']) ? trim($_GET['t']) : '';
            //The id for the request, which should be present in the GET variable "id"
            $passwordRequestId = isset($_GET['id']) ? trim($_GET['id']) : '';
            
            
            //Now, we need to query our password_reset_request table and
            //make sure that the GET variables we received belong to
            //a valid forgot password request.
            
            $sql = "SELECT id, user_id, date_requested FROM password_reset_request WHERE user_id = :user_id AND token = :token AND id = :id";
            
            //Prepare our statement.
            $statement = $pdo->prepare($sql);
            
            //Execute the statement using the variables we received.
            $statement->execute(array(
                "user_id" => $userId,
                "id" => $passwordRequestId,
                "token" => $token
            ));
            
            //Fetch our result as an associative array.
            $requestInfo = $statement->fetch(PDO::FETCH_ASSOC);
            
            //If $requestInfo is empty, it means that this
            //is not a valid forgot password request. i.e. Somebody could be
            //changing GET values and trying to hack our
            //forgot password system.
            if(empty($requestInfo)){
                echo '<h3 style="text-align:center;color:red">Invalid request!</h3>';
            } else {
            //The request is valid, so give them a session variable
            //that gives them access to the reset password form.
            $_SESSION['user_id_reset_pass'] = $userId;
            echo <<<changeForm
            <form method="POST">
            <div class="form-group fxt-transformY-50 fxt-transition-delay-2">                                                
                <input type="password" class="form-control" name="password" placeholder="Your new password" required="required">
                <i class="fas fa-lock"></i>
            </div>
            <div class="form-group fxt-transformY-50 fxt-transition-delay-4">
                <button type="submit" class="fxt-btn-fill" name="new_password">change password</button>
            </div>
        </form> 
changeForm;
            }
    } catch (PDOException $e) {
        echo 'query failed' . $e->getMessage();
    }
   
}

function new_password_insert(){
    global $pdo;
    if(isset($_POST['new_password']) && isset($_SESSION['user_id_reset_pass'])){
        try {
            $password = MD5(trim($_POST['password']));
            $sql = "UPDATE `users` SET `password_hash` = :password WHERE `users`.`id` = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['password'=>$password, 'id'=>$_SESSION['user_id_reset_pass']]);
            if($stmt->rowCount() > 0){
                $_SESSION['msgPasschanged'] = "your password changed successfully";
                redirect('login.php');
            }else{
                set_message('error','try again later');

            }

        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}
?>
