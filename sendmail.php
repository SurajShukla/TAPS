<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email   = htmlspecialchars(trim($_POST['email'] ?? ''));
    $phone   = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $interest = htmlspecialchars(trim($_POST['interest'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    $to = "upendrarai340@gmail.com";
    $subject = "New Message from Website Contact Form";

    $body = "
    <h2>New Contact Message</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Phone:</strong> $phone</p>
    " . (!empty($interest) ? "<p><strong>Service Interest:</strong> $interest</p>" : "") . "
    <p><strong>Message:</strong><br>$message</p>
    ";

    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Website Contact <noreply@" . $_SERVER['SERVER_NAME'] . ">\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "✅ Your message has been sent successfully!";
    } else {
        echo "❌ Failed to send message. Please try again later.";
    }
}
?>
