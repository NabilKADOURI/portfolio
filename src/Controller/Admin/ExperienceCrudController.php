<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Trait\DetailTrait;
use App\Entity\Experience;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ExperienceCrudController extends AbstractCrudController
{
    use DetailTrait;

    public static function getEntityFqcn(): string
    {
        return Experience::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideWhenUpdating()->hideWhenCreating(),
            TextField::new('name'),
            TextField::new('job'),
            DateTimeField::new('start_year'),
            DateTimeField::new('end_year'),
            TextEditorField::new('description'),
            TextField::new('additional_information'),
            ImageField::new('picture')
            ->setBasePath('uploads/')
            ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
            TextField::new('icon'),
        ];
    }
   
}
