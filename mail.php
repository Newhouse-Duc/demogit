<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendmail($email,$name,$title,$content){
    try {
        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'nhanbotnet@gmail.com';                    
        $mail->Password   = 'grgdpcztfsmtygpa';                           
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
        $mail->Port       = 465;                                  
        $mail->CharSet='UTF-8';
        //Recipients
        $mail->setFrom('nhanbotnet@gmail.com', 'MũNónChất');
        $mail->addAddress($email,$name);    
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $title;
        $mail->Body    = $content;

        $mail->send();
       
    } catch (Exception $e) {
        
    }

}


