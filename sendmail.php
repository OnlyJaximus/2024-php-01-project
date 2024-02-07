<?php
require_once 'config/function.php';
require_once 'vendor/autoload.php';

$host = "smtp.gmail.com";
$port = "587";
$ssOrTls = "tls";

$setUsername = "testmercatesting@gmail.com";
$setPassword = "xaibdlprvlhgcilz";

$emailAddress = "testmercatesting@gmail.com";
$sendEmailAddress = "testmercatesting@gmail.com";
$subject = "You got new enqury";

if (isset($_POST['contactSubmit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $message = $_POST['message'];


    $bodyContent = '<div>
    <h4>Name : . ' . $name . '.</h4>
    <h4>Email : ' . $email . '</h4>
    <h4>Phone Number : ' . $phone . '</h4>
    <h4>Service :  ' . $service . '</h4>
    <h4>Message :  ' . $message . '</h4>

    
    </div>';



    try {

        // Create the Transport
        $transport = (new Swift_SmtpTransport($host,  $port, $ssOrTls))
            ->setUsername($setUsername)
            ->setPassword($setPassword);

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message($subject))
            ->setFrom([$emailAddress => 'BlekY Services'])
            ->setTo([$sendEmailAddress])
            ->setBody($bodyContent, 'text/html');

        // Send the message
        $result = $mailer->send($message);

        if ($result) {
            redirect('contact-us.php', 'Thank You for contacting us. We will get back to you asap.');
        } else {
            redirect('contact-us.php', 'Something went wrong');
        }
    } catch (\Exception $e) {
        redirect('contact-us.php', 'Something went wrong: ' . $e->getMessage());
    }
}
