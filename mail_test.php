<?php
// Author Adarsh Gupta
// created on 06-04-2023
// to recive and send mails 
// prerequisite
// <<==>>  install PHPMailer to your sever or system 
// <<==>> install php-imap function to your sytem or server
// <<==>> configure you email app password 

// <<=========================================================new ============================================================>>
// <<======================================================= send mail start ========================================================================>>

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/edasadmin/PHPMailer/src/Exception.php';
require '/home/edasadmin/PHPMailer/src/PHPMailer.php';
require '/home/edasadmin/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                // Enable SMTP authentication
    $mail->Username = 'ag23107@gmail.com';             // SMTP username
    $mail->Password = 'gdzmzgeyrwkftwgj';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, TLS also accepted with port 465
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('ag23107@gmail.com', 'Mailer');          //This is the email your form sends From
    $mail->addAddress('adarsh.gupta0131@gmail.com', 'Adarsh'); // Add a recipient address
    //$mail->addAddress('contact@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Welcome boy!';
    $mail->Body    = 'Hello Adarsh you successfully sent email ';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

// <<======================================================= send mail end ========================================================================>>

// <<======================================================= receive mails start ========================================================================>>

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

//Server settings
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ag23107@gmail.com';                 // SMTP username
$mail->Password = 'gdzmzgeyrwkftwgj';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'ag23107@gmail.com';
$password = 'gdzmzgeyrwkftwgj';

$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to mailbox: ' . imap_last_error());
// ALL
$emails = imap_search($inbox,'SEEN FROM "netra@gloify.com"');

if($emails) {
  foreach($emails as $email_number) {
    $overview = imap_fetch_overview($inbox,$email_number,0);
    $message = imap_fetchbody($inbox,$email_number,2);

    echo "Subject: ".$overview[0]->subject."\n";
    echo "Message: ".$message."\n";
  }
}else{
    echo "No msg";
}

imap_close($inbox);

// <<======================================================= receive mails end ========================================================================>>

?>



