<?php
  $Email="";
  $Message="";
  $phone="";
  $Fullname="";
  $Subject="";

if(isset($_POST['submit']))
{
    $Email=$_POST['email'];
    $Message=$_POST['message'];
    $phone=$_POST['tel'];
    $Fullname=$_POST['fullname'];
    $Subject=$_POST['subject'];
}



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.titan.email';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'services@oliveclarkerealestate.com';                     //SMTP username
    $mail->Password   = 'OCReal_Estate2023';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('services@oliveclarkerealestate.com', 'Mailer');
    $mail->addAddress($Email, $Fullname);     //Add a recipient
    $mail->addAddress('rohan.powell36@yahoo.com');               //Name is optional
    $mail->addReplyTo('services@oliveclarkerealestate.com', 'Information');
    $mail->addCC('services@oliveclarkerealestate.com');
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $Subject;
    $mail->Body    = '<h3>Message from </h3>'.$Fullname.'<h3>Email</h3>'.$Email.'<h3>Contact</h3>'.$phone.'<h3>Message</h3>'.$Message;
    $mail->AltBody = $Message;

    $mail->send();
   
    header("Location:Thankyou.html");
} catch (Exception $e) {
  //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo '<script>alert("Message could not be sent")</script>';
    //header("Location:index.html");
   
}

 
