<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Trait\ReadOnlyTrait;
use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class ContactCrudController extends AbstractCrudController
{
    use ReadOnlyTrait;
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }
}
