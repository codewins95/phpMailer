<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    $inquiry_type = $_POST['inquiry_type'] ?? '';
    $gender = $_POST['gender'] ?? '';

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = ''; // your email
        $mail->Password = ''; // your email password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('', ''); // your email
        $mail->addAddress(''); // recipient email
        $mail->isHTML(true);
        $mail->Subject = 'New Enquiry Message';

        // Build the email body
        $mail->Body = '<h3>Hello, you got a new inquiry</h3>
                       <h4>Full Name: ' . htmlspecialchars($fullName) . '</h4>
                       <h4>Email: ' . htmlspecialchars($email) . '</h4>
                       <h4>Phone Number: ' . htmlspecialchars($phone) . '</h4>';

        if (!empty($subject)) {
            $mail->Body .= '<h4>Subject: ' . htmlspecialchars($subject) . '</h4>';
        }
        if (!empty($message)) {
            $mail->Body .= '<h4>Message: ' . htmlspecialchars($message) . '</h4>';
        }
        if (!empty($inquiry_type)) {
            $mail->Body .= '<h4>inquiry_type: ' . htmlspecialchars($inquiry_type) . '</h4>';
        }

        if (!empty($gender)) {
            $mail->Body .= '<h4>Gender: ' . htmlspecialchars($gender) . '</h4>';
        }

        if ($mail->send()) {
            echo json_encode([
                'success' => true,
                'error' => false,
                'message' => 'Thank you for contacting us.'
            ]);
            exit(0);
        }
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'error' => true,
            'message' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo
        ]);
        exit(0);
    }
} else {
    echo json_encode([
        'success' => false,
        'error' => true,
        'message' => 'Invalid form submission.'
    ]);
    exit(0);
}
