<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $fullName = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vinaypandey.hbs@gmail.com';
        $mail->Password = 'lpmixbmnthiyetqq';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('mks957678@gmail.com'); //your gmail
        $mail->addAddress('mks957678@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'New Enquiry Message';
        $mail->Body    = '<h3>Hello, you got a new inquiry</h3>
                          <h4>Full Name: ' . @$fullName . '</h4>
                          <h4>Email : ' . @$email . '</h4>
                          <h4>Phone Number: ' . @$phone . '</h4>                          
                          <h4>Message: ' . @$message . '</h4>';
        //$mail->SMTPDebug = 2;



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
