<?php

class Mailer {

    private $object;
    private $transport;
    private $message;


    public function __construct($object)
    {   
        $this->object = $object;
        $this->transport = new Swift_SmtpTransport('smtp.gmail.com', 587,'tls');
        $this->transport
                ->setUsername('iss17005@gmail.com')
                ->setPassword('toby1705');
        $this->message = new Swift_Message($this->object);
    }

    public function setTo($to){
        $this->message->setTo($to);
        return $this;
    }

    public function envoi($msg){
        $mail = new Swift_Mailer($this->transport);
        $this->message->setFrom(['bassirouniang18007@gmail.com' => 'Bassirou Niang']);
        $this->message->setBody($msg);
        $mail->send($this->message);
    } 




}