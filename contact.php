<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Validate form fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo '<p class="text-danger">Please fill in all fields.</p>';
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<p class="text-danger">Invalid email format.</p>';
        exit;
    }

    // Send email
    $to = "ondrej.hruby66@gmail.com"; // Replace with your email address
    $email_subject = "New Contact Form Message: $subject";
    $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    $headers = "From: $email";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo '<p class="text-success">Your message has been sent successfully!</p>';
    } else {
        echo '<p class="text-danger">Failed to send your message. Please try again later.</p>';
    }
} else {
    echo '<p class="text-danger">Invalid request.</p>';
}
?>
