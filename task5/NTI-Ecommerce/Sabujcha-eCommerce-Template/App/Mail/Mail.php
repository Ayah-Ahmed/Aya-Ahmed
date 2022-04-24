<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

abstract class Mail
{

    protected $mail;
    protected $mailTo;
    protected $subject;
    protected $body;

    public function __construct(string $mailTo, string $subject, string $body)
    {
        //can not connect to smtp server
        $this->mailTo = $mailTo;
        $this->subject = $subject;
        $this->body = $body;
        $this->mail = new PHPMailer(true);

        // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        // $this->mail->isSMTP();                                            //Send using SMTP
        // $this->mail->Host       = 'localhost';                     //Set the SMTP server to send through
        // $this->mail->SMTPAuth   = false;                                   //Enable SMTP authentication
        $this->mail->Username   = ' ntiapril2022@gmail.com';                     //SMTP username
        $this->mail->Password   = 'Nti123456@';                               //SMTP password
        // $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        // $this->mail->SMTPAutoTLS = false;
        // $this->mail->Port = 465;
        $this->mail->isSMTP(); // Set mailer to use SMTP
        $this->mail->CharSet = "utf-8"; // set charset to utf8
        $this->mail->SMTPAuth = true; // Enable SMTP authentication
        $this->mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted

        $this->mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $this->mail->Port = 587; // TCP port to connect to
        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
    }

    public abstract function send();
}