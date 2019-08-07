<?php
$to = 'fabio.rizzaro@gmail.com';
$subject = "Beautiful HTML Email using PHP by CodexWorld";

$htmlContent = file_get_contents("eMail/mail.html");

// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: CodexWorld<sender@example.com>' . "\r\n";
$headers .= 'Cc: welcome@example.com' . "\r\n";
$headers .= 'Bcc: welcome2@example.com' . "\r\n";

// Send email
if(mail($to,$subject,$htmlContent,$headers)):
    echo 'Email has sent successfully.';
else:
    echo 'Email sending fail.s';
endif;


?>