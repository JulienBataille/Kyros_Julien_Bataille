<?php

namespace App\Controller\Admin;

use App\Entity\InfoContact;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class InfoContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InfoContact::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('email', 'email'),
            TextField::new('phone', 'N° de téléphone'),
            TextEditorField::new('address', 'adresse de contact'),
        ];
    }
}
