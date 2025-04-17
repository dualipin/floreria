<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/../../libs/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../../libs/PHPMailer/src/SMTP.php';

class CorreoController
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function enviar()
    {
        $credential = $this->load_credential();
        try {
            $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $this->mail->isSMTP();                                            // Set mailer to use SMTP
            $this->mail->Host       = $credential["host"];     // Specify main and backup SMTP servers
            $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->mail->Username   = $credential["email"];                     // SMTP username
            $this->mail->Password   = $credential["password"];                               // SMTP password   
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable SMTPS encryption
            $this->mail->Port       = $credential["port"];                                    // TCP port to connect to
            $this->mail->setFrom($credential["email"], 'Floreria Macus'); // Set who the message is to be sent from
            $this->mail->addAddress('martin.msr1304@gmail.com');     // Add a recipient

            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = 'Hola Amigo';
            $this->mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $this->mail->send();

            echo 'Message has been sent';
        } catch (\Throwable $e) {
            echo 'Message could not be sent. Mailer Error: ', $this->mail->ErrorInfo;
        }
    }

    private function load_credential()
    {
        return [
            "email" => CREDENTIALS["EMAIL"],
            "host" => CREDENTIALS["EMAIL_HOST"],
            "port" => CREDENTIALS["EMAIL_PORT"],
            "password" => CREDENTIALS["EMAIL_PASS"],
        ];
    }
}
