<?php

namespace App\Controller\Admin;

use App\Entity\Emploi;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EmploiCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Emploi::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id') -> onlyOnIndex(),
            TextField::new('poste', 'Nom du Poste'),
            TextField::new('society', 'Nom de la société'),
            DateField::new('dateDebut', 'Date de début')
                ->setColumns(6),
            DateField::new('dateFin', 'Date de fin')
                ->setColumns(6),
            TextEditorField::new('description'),
        ];
    }
    
}
