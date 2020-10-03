<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function send_mail_php(){

// require_once 'config.php';
// require_once __DIR__ . DS . '../vendor/autoload.php';

$mail = new PHPMailer(true);
 
if(isset($_POST['submit'])){
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = '';   //username
            $mail->Password = '';   //password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;                    //smtp port
          
            $fullname = htmlspecialchars(stripslashes(trim($_POST['name']))); // Get Name value from HTML Form
            $email = htmlspecialchars(stripslashes(trim($_POST['email']))); // Get Email Value
            $sujet = htmlspecialchars(stripslashes(trim($_POST['subject']))); // Get Subject value
            $msg = htmlspecialchars(stripslashes(trim($_POST['comments']))); // Get Message Value
            if(!preg_match("/^[A-Za-z .'-]+$/", $fullname)){
            $name_error = 'Invalid full name';
            }
            if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
            $email_error = 'Invalid email';
            }
            if(!preg_match("/^[A-Za-z .'-]+$/", $sujet)){
            $subject_error = 'Invalid subjcet';
            }
            if(strlen($msg) === 0){
            $message_error = 'Your message should not be empty';
            }
            $to = "hraf.abbassi@gmail.com"; // You can change here your Email
            $subject = "$sujet"; // This is your subject
             
            // HTML Message Starts here
            $message ="
            <html>
                <body>
                    <table style='width:600px;'>
                        <tbody>
                            <tr>
                                <td style='width:150px'><strong>Name: </strong></td>
                                <td style='width:400px'>$fullname</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Email ID: </strong></td>
                                <td style='width:400px'>$email</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Subject: </strong></td>
                                <td style='width:400px'>$sujet</td>
                            </tr>
                            <tr>
                                <td style='width:150px'><strong>Message: </strong></td>
                                <td style='width:400px'>$msg</td>
                            </tr>
                        </tbody>
                    </table>
                </body>
            </html>
            ";
            // HTML Message Ends here

            $mail->setFrom($email, $fullname);
            $mail->addAddress($to, '2AI');
         
         
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
         
            
            
            if($mail->send() && !isset($name_error) && !isset($subject_error) && !isset($email_error) && !isset($message_error)){
            // Message if mail has been sent
            echo "<script>toastr.success('Message has been sent', 'success');</script>";
            }else{
                // Message if mail has been not sent
                echo "<script>toastr.error('Try again later', 'Error');</script>";       
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
        }

       
}
}
?>