<?php require 'HeaderFooter/Header.php'; ?>
<!--<body>-->
<?php
require("libs/PHPMailer/PHPMailer.php");
require("libs/PHPMailer/SMTP.php");
require("libs/PHPMailer/Exception.php");

//$mail = new PHPMailer\PHPMailer\PHPMailer();
//
//$mail->IsSMTP(true); // enable SMTP
//////************
////$mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
////$mail->Port = 587;
////$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
////$mail->SMTPSecure = 'ssl';
////$mail->Username = 'eu@gmail.com'; // Usuário do servidor SMTP
////$mail->Password = 'minhasenha'; // Senha do servidor SMTP
//////************
//
//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
//$mail->SMTPAuth = true; // authentication enabled
//$mail->SMTPSecure = 'tsl'; // secure transfer enabled REQUIRED for Gmail
//$mail->Host = "smtp.gmail.com";
//$mail->Port = 587; // or 587
//$mail->IsHTML(true);
//$mail->Username = "fabio.rizzaro@gmail.com";
//$mail->Password = "GOOpwd00!";
//$mail->SetFrom("contato@alliqua.com.br");
//$mail->Subject = "Test";
//$mail->Body = file_get_contents("views/Mails/subscriptionReceived.html");
//$mail->AddAddress("fabio.rizzaro@gmail.com");
//
//
//if (!$mail->Send()) {
//    echo "Mailer Error: " . $mail->ErrorInfo;
//} else {
//    echo "Message has been sent";
//}



//---------------------------------------------------------------------------------

//Create a new PHPMailer instance
$mail = new PHPMailer\PHPMailer\PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tsl';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "fabio.rizzaro@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "GOOpwd00!";

//Set who the message is to be sent from
$mail->setFrom('from@example.com', 'First Last');

//Set an alternative reply-to address
$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('fabio.rizzaro@gmail.com', 'John Doe');

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents("views/Mails/subscriptionReceived.html"));

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message sent!";
//Section 2: IMAP
//Uncomment these to save your message in the 'Sent Mail' folder.
#if (save_mail($mail)) {
#    echo "Message saved!";
#}
}



//---------------------------------------------------------------------------------


?>

<div class="container">
    <div class="row align-items-start justify-content-center" style="height: 200px; background-color: #ccc; margin-top: 5px">
        <div class="col col-12 col-lg-2 bg-primary">
            One of three columns
        </div>
        <div class="col col-12 col-lg-4 align-self-center">
            <div class="bg-danger justify-content-center align-items-center d-flex border" style="height: 100px;">
                <div>teste</div>
            </div>
        </div>
        <div class="col col-12 col-lg-2">
            One of three columns
        </div>
    </div>
    <div class="row align-items-center" style="height: 200px; background-color: #ccc; margin-top: 5px">
        <div class="col">
            One of three columns
        </div>
        <div class="col">
            One of three columns
        </div>
        <div class="col">
            One of three columns
        </div>
    </div>
    <div class="row align-items-end" style="height: 200px; background-color: #ccc; margin-top: 5px">
        <div class="col">
            One of three columns
        </div>
        <div class="col">
            One of three columns
        </div>
        <div class="col">
            One of three columns
        </div>
    </div>
</div>
<!--</body>-->

<?php require 'HeaderFooter/Footer.php'; ?>
