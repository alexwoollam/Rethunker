<?php

declare(strict_types=1); # -*- coding: utf-8 -*-

namespace App\Controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Mail{

    public $to;
    public $name;
    public $subject;
    public $body;

    public function __construct($post){
        $this->to = $post['to'];
        $this->name = $post['name'];
        $this->subject = $post['subject'];
        $this->body = $post['body'];
    }

    public function Send(){

        $mail = new PHPMailer(true);
        try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'mail';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'mailhog';
            $mail->Password   = 'secret';
            $mail->Port       = 1025;
        
            $mail->setFrom('test@localhost.net', 'Mailer');
            $mail->addAddress($this->to, $this->name);
            $mail->addReplyTo('info@localhost.net', 'Information');            
            
            $mail->isHTML(true);                                  
            $mail->Subject = $this->subject;
            $mail->Body    = $this->body;
        
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
