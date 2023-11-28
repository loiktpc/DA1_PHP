<?php
require './Site/UserSendMail/PHPMailer/src/Exception.php';
require './Site/UserSendMail/PHPMailer/src/PHPMailer.php';
require './Site/UserSendMail/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMaileruser;
use PHPMailer\PHPMailer\Exceptionmail;

class sendmail{
     public function usersendmail($name,$email,$phone,$message)
    {
        $mail = new PHPMaileruser(true);

        try {
           

            $mail->SMTPAuth = true;
            $mail->isSMTP();
            $mail->CharSet = 'utf8';
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nhihtpc05227@fpt.edu.vn';
            $mail->Password = 'zzzh lhnx ojpu jatc';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom($email, $name);
            $mail->addAddress('nhihtpc05227@fpt.edu.vn', 'Tuyết Nhi');
            $mail->addReplyTo($email,$name);
            $mail->isHTML(true);
            $mail->Subject = ("$email ($phone)");
            $mail->Body = $message;

            $mail->send();
           
        } catch (Exceptionmail $e) {
            echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        }
    } 
}
