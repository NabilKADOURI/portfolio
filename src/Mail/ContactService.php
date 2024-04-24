<?php 

namespace App\Mail;

use App\Entity\Contact;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class  ContactService
{

    public function __construct (

        private MailerInterface $mailer
    ){
        
    }

    public function sendConfirmation(Contact $Contact) :void
    
    {

        $email = (new Email())

        ->from('mailtrap@localhost')
        ->to($Contact->getEmail())
        ->subject("Demande prise en compte")
        ->html("<p>Votre demande a été prise en compte</p>");
    
        $this->mailer->send($email);

    }

    
}