<?php
require_once "../function.php";
$insert=new DB_connect();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$data["name"]=$insert->test_input($_POST["name"]);
	$data["email"]=$insert->test_input($_POST["email"]);
	$data["subject"]=$insert->test_input($_POST["subject"]);
	$data["message"]=$insert->test_input($_POST["message"]);
}
$insert->insert($data,'contact');
$array=explode(' ',$data['name']);

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../PHPMailer/PHPMailer/src/PHPMailer.php';
require '../PHPMailer/PHPMailer/src/SMTP.php';
require '../PHPMailer/PHPMailer/src/Exception.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'showcasecommerce@gmail.com';                 // SMTP username
    $mail->Password = 'th1s1sshowcase';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('showcasecommerce@gmail.com', 'ShowCase');
    $mail->addAddress($data['email']);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('showcasecommerce@gmail.com');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Thank you email from ShowCase';
    $mail->Body    = '<div style="text-align:center;"><h1 style="color:#500050;">Thank you for contacting ShowCase '.ucfirst($array[0]).'! </h1>
    					<p style="font-size:150%;">Thank you for contacting us.<br>We have received your message and will reply as soon as possible.</p></div>';
    $mail->AltBody = 'Thank you for contatcing Showcase!Thank you for contacting us.We have received your message and will reply as soon as possible.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>
<html>
<body onload="myFunction();">
<a id="redirect" href="../confirmation.php">h</a>
<script>
    function myFunction()
        {
            window.location.href="../confirmation.php";
        }
</script>
</body>
</html>


