<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = 'onwukakamsiisaac@gmail.com';            // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                    // Enable SMTP authentication
    $mail->Username = 'onwukakamsiisaac@gmail.com';  // Your Gmail address
    $mail->Password = 'ebkh npxu vhvy htao';         // Your Gmail password or app password
    $mail->SMTPSecure = 'tls';                 // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                         // TCP port to connect to

    // Recipients
    $mail->setFrom('onwukakamsiisaac@gmail.com', 'Bayview Hotel');
    $mail->addAddress('onwukakamsiiz@gmail.com'); // Add a recipient

    // Content
    $mail->isHTML(true);                        // Set email format to HTML
    $mail->Subject = 'New Booking Request';
    
    // Create a dynamic email body using form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $street = htmlspecialchars($_POST['street']);
    $street_number = htmlspecialchars($_POST['street-number']);
    $city = htmlspecialchars($_POST['city']);
    $post_code = htmlspecialchars($_POST['post-code']);
    $country = htmlspecialchars($_POST['country']);
    $arrive = htmlspecialchars($_POST['arrive']);
    $depart = htmlspecialchars($_POST['depart']);
    $people = htmlspecialchars($_POST['people']);
    $room = htmlspecialchars($_POST['room']);
    $bedding = htmlspecialchars($_POST['bedding']);
    $comments = htmlspecialchars($_POST['comments']);

    $mail->Body = "
        <h2>New Booking Request</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Address:</strong> $street $street_number, $city, $post_code, $country</p>
        <p><strong>Arrival Date:</strong> $arrive</p>
        <p><strong>Departure Date:</strong> $depart</p>
        <p><strong>Number of People:</strong> $people</p>
        <p><strong>Room Type:</strong> $room</p>
        <p><strong>Bedding Type:</strong> $bedding</p>
        <p><strong>Comments:</strong> $comments</p>
    ";
    
    $mail->AltBody = "New Booking Request\nName: $name\nEmail: $email\nPhone: $phone\nAddress: $street $street_number, $city, $post_code, $country\nArrival Date: $arrive\nDeparture Date: $depart\nNumber of People: $people\nRoom Type: $room\nBedding Type: $bedding\nComments: $comments";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>


