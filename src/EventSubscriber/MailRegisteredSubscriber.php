<?php

namespace App\EventSubscriber;

use App\Event\MailRegisteredEvent;
use App\Mail\ContactService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MailRegisteredSubscriber implements EventSubscriberInterface
{

    public function __construct( 
        private ContactService $contactService
    ){

    }

    public function sendConfirmationEmail(MailRegisteredEvent $event): void
    {
        $email = $event->getContact();
        $this->contactService->sendConfirmation($email);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            MailRegisteredEvent::NAME => 'sendConfirmationEmail',
        ];
    }
}
