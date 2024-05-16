<?php

namespace App\Event;

use App\Entity\Contact;


class MailRegisteredEvent
{
  public const NAME = 'Mail.registered';

  public function __construct(private Contact $contact)
  {
  }

  public function getContact(): Contact
  {
    return $this->contact;
  }
}