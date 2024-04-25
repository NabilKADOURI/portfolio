<?php 

namespace App\Mail;

use App\Entity\Contact;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class  ContactService
{

    public function __construct (private MailerInterface $mailer, private string $adminEmail){
        
    }

    public function sendConfirmation(Contact $Contact) :void
    
    {

        $email = (new Email())

        ->from($this->adminEmail)
        ->to($Contact->getEmail())
        ->subject("Demande prise en compte")
        ->html("<p>Madame, Monsieur,</p> 
        
        <p>Nous accusons réception de votre demande.</p>
        
        <p>Nous vous remercions de votre confiance et de l'intérêt que vous portez à nos services.</p>
        
        <p>Votre demande est actuellement en cours de traitement par notre équipe . Nous vous contacterons de nouveau dans les plus brefs délais pour vous apporter une réponse complète et personnalisée.</p>
        
        <p>En attendant, n'hésitez pas à nous contacter si vous avez des questions.</p>
        
        <p>Cordialement,</p>");
    
        $this->mailer->send($email);

    }

    
}