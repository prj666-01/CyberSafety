<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'includes/Exception.php';
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
//Load Composer's autoloader
//require 'vendor/autoload.php';
  
sendMail($username,$email) {
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'knowledgeflowmail@gmail.com';                 // SMTP username
        $mail->Password = 'xvLO7429op';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        //Recipients
        $mail->setFrom('noreply@cybersafetyfoundation.org', 'CyberSafety');
        $mail->addAddress('iblacker@me.com', 'Ruihui Yan');     // Add a recipient
        $mail->addAddress('itsruihui@gmail.com');
        $mail->addAddress('ryan12@myseneca.ca');
        $mail->addAddress('emile.ohan@senecacollege.ca');             // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Welcome to KnowledgeFlow!';
        $mail->Body    = 'This is a test';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    
}
?>
