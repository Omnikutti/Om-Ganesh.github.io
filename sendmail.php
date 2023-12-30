<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer Autoload file
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.omganeshganesh723@gmail.com';  // Replace with your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'omganeshganesh723@gmail.com';  // Replace with your email address
        $mail->Password   = 'Srinivas@994';     // Replace with your email password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender and recipient settings
        $mail->setFrom($email, $name);  // Set the "From" address dynamically
        $mail->addAddress('omganeshsrinivas@gmail.com');  // Replace with the recipient's email

        // Content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->SMTPDebug = 2;  // Set the debugging level (0 for no output, 2 for detailed debug output)
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
}
?>
