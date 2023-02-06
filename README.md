# mailer
to send and receive mails 
To receive or send emails using PHPMailer, you can create a PHP script that connects to your email server and fetches email messages. Here are the steps to achieve this:

Install PHPMailer: You can install PHPMailer using composer by running the following command: "composer require phpmailer/phpmailer".

Connect to your email server: In your PHP script, use the following code to connect to your email server:

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

//Server settings
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.example.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'user@example.com';                 // SMTP username
$mail->Password = 'secret';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;  

 you need to use an application-specific password to access your Gmail account using PHPMailer. Google requires this for security reasons when accessing your account using third-party applications.

To resolve this issue, you need to generate an application-specific password for PHPMailer and use that password instead of your Gmail account password. Here's how you can do it:

Log in to your Gmail account.
Go to the "Security" section of your Google Account settings.
Scroll down to the "Signing in to Google" section.
Click on "App Passwords".
Select "Other (Custom Name)" from the dropdown menu and enter a name for the app, such as "PHPMailer".
Click on "Generate".
Google will show you a generated password. Copy this password.
Replace 'yourpassword' with this new application-specific password in your PHPMailer code.
Note: If you ever need to revoke the application-specific password, you can do so in the "App Passwords" section of your Google Account security settings.
