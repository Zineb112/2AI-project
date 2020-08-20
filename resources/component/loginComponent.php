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

?>
