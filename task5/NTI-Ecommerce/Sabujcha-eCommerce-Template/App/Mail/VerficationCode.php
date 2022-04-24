<?php

namespace App\Mail;

use PHPMailer\PHPMailer\Exception;

class VerficationCode extends Mail
{
    public function send()
    {
        try {
            $this->mail->setFrom('ntiapril2022@gmail.com', 'NTI');

            $this->mail->addAddress($this->mailTo);
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = $this->subject;
            $this->mail->Body    = $this->body;
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            // die;
            return false;
        }
    }
}