<?php


//Helper Functions

function redirect($location)
{
    header("location: $location");
}

// Set up your messgae
function set_message($type,$msg)
{
    if($type === "error"){
        !empty($msg) ? $_SESSION['message-err'] = $msg : $msg = "";
    }   
    if($type === "info"){
        !empty($msg) ? $_SESSION['message-info'] = $msg : $msg = "";
    }   
    if($type === "success"){
        !empty($msg) ? $_SESSION['message-success'] = $msg : $msg = "";
    }   
    
}


// Display your message

function display_msg()
{
    if (isset($_SESSION['message-err'])) {
        echo "<script>toastr.error('{$_SESSION['message-err']}', 'Error');</script>";
        unset($_SESSION['message-err']);
    }
    if (isset($_SESSION['message-info'])) {
        echo "<script>toastr.info('{$_SESSION['message-info']}', 'info');</script>";
        unset($_SESSION['message-info']);
    }
    if (isset($_SESSION['message-success'])) {
        echo "<script>toastr.success('{$_SESSION['message-success']}', 'success');</script>";
        unset($_SESSION['message-success']);
    }
}









?>