<?php
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}


$firstName = isset($_POST['first-name']) ? trim($_POST['first-name']) : '';
$lastName  = isset($_POST['last-name']) ? trim($_POST['last-name']) : '';
$email     = isset($_POST['email']) ? trim($_POST['email']) : '';
$telephone = isset($_POST['telephone']) ? trim($_POST['telephone']) : '';
$message   = isset($_POST['message']) ? trim($_POST['message']) : '';
$terms     = isset($_POST['terms']) ? true : false;


if (empty($firstName) || empty($lastName) || empty($email) || empty($message) || !$terms) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields and accept the Terms & Conditions.']);
    exit;
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Please provide a valid email address.']);
    exit;
}


$dataFile = __DIR__ . '/messages.json';
$newData = [
    'date'       => date('Y-m-d H:i:s'),
    'first_name' => $firstName,
    'last_name'  => $lastName,
    'email'      => $email,
    'telephone'  => $telephone,
    'message'    => $message
];

$currentData = [];
if (file_exists($dataFile)) {
    $fileContents = file_get_contents($dataFile);
    if ($fileContents) {
        $decoded = json_decode($fileContents, true);
        if (is_array($decoded)) {
            $currentData = $decoded;
        }
    }
}
$currentData[] = $newData;

if (file_put_contents($dataFile, json_encode($currentData, JSON_PRETTY_PRINT), LOCK_EX) === false) {
    echo json_encode(['success' => false, 'message' => 'Failed to save data. Please check permissions.']);
    exit;
}

function sendEmail($to, $subject, $body, $headers) {
    return @mail($to, $subject, $body, $headers);
}


$emailConfig = require_once __DIR__ . '/../config/email-config.php';


$adminEmails = $emailConfig['admin_emails'];
$senderEmail = $emailConfig['sender_email'];

$headers  = "From: Movie Library <" . $senderEmail . ">\r\n";
$headers .= "Reply-To: " . $senderEmail . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";


$userSubject = "Thank you for contacting Movie Library";
$userBody = "Hi $firstName,\n\nThank you for reaching out! We have received your message and will get back to you soon.\n\nYour Message:\n$message\n\nBest Regards,\nMovie Library Team";
$userMailSent = sendEmail($email, $userSubject, $userBody, $headers);


$adminSubject = "New Contact Form Submission - Movie Library";
$adminBody = "You have received a new message from the contact form.\n\n";
$adminBody .= "Name: $firstName $lastName\n";
$adminBody .= "Email: $email\n";
$adminBody .= "Telephone: $telephone\n\n";
$adminBody .= "Message:\n$message\n";
$allAdminsSent = true;
foreach ($adminEmails as $adminEmail) {
    if (!sendEmail($adminEmail, $adminSubject, $adminBody, $headers)) {
        $allAdminsSent = false;
    }
}


if ($userMailSent && $allAdminsSent) {
    echo json_encode(['success' => true, 'message' => 'Thank you! Your message was sent successfully.']);
} else {

    echo json_encode(['success' => true, 'message' => 'Your message was saved, but we could not send the confirmation emails.']);
}
?>
