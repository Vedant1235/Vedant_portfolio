<?php
phpinfo();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = "roronoavedant@gmail.com";
    $subject = "New Contact Form Submission";
    $headers = "From: $fullname <$email>";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Error sending email.";
    }
}
?>
