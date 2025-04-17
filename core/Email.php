<?php

namespace Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . '/../libs/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/../libs/PHPMailer/src/SMTP.php';

class Email
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function send($to, $subject, $body, $altBody = '', $fromEmail = null, $fromName = 'Floreria Macus')
    {
        try {
            // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $this->mail->isSMTP();                                            // Set mailer to use SMTP
            $this->mail->Host       = CREDENTIALS["EMAIL_HOST"];                    // Specify main and backup SMTP servers
            $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->mail->Username   = CREDENTIALS["EMAIL"];                   // SMTP username
            $this->mail->Password   = CREDENTIALS["EMAIL_PASS"];                // SMTP password   
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable SMTPS encryption
            $this->mail->Port       = CREDENTIALS["EMAIL_PORT"];                    // TCP port to connect to

            $fromEmail = $fromEmail ?? CREDENTIALS["EMAIL"];                  // Default sender email if not provided
            $this->mail->setFrom($fromEmail, $fromName);                      // Set who the message is to be sent from
            $this->mail->addAddress($to);                                     // Add a recipient

            $this->mail->CharSet = 'UTF-8';                                   // Set UTF-8 encoding
            $this->mail->isHTML(true);                                        // Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->AltBody = $altBody ?: strip_tags($body);             // Fallback to plain text if no altBody provided

            $this->mail->send();

            return 'Message has been sent';
        } catch (\Throwable $e) {
            return 'Message could not be sent. Mailer Error: ' . $this->mail->ErrorInfo;
        }
    }
}
