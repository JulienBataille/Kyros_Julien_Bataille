<?php

namespace App\Controller\Admin;

use App\Entity\Diplome;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DiplomeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Diplome::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id') -> onlyOnIndex(),
            TextField::new('name', 'Nom du diplome'),
            TextField::new('school', 'Nom de l\'école'),
            DateField::new('dateDebut', 'Date de début')
                ->setColumns(6),
            DateField::new('dateFin', 'Date de fin')
                ->setColumns(6),

        ];
    }
    
}
