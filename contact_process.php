<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form fields
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Your email address
    $to = "pamol1781994@gmail.com";

    // Create the email subject and body
    $email_subject = "New Message from: " . $name;
    $email_body = "You have received a new message from your contact form.\n\n" .
                  "Name: " . $name . "\n" .
                  "Email: " . $email . "\n" .
                  "Subject: " . $subject . "\n" .
                  "Message: \n" . $message;

    // Email headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>alert('Your message has been sent successfully.'); window.location.href = 'thank_you.html';</script>";
    } else {
        echo "<script>alert('Sorry, there was an error sending your message. Please try again later.');</script>";
    }
}
?>
