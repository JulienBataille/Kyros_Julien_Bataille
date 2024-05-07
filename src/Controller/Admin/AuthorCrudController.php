<?php

namespace App\Controller\Admin;

use App\Entity\Author;

use App\Controller\Admin\ToDoCrudController;
use App\Controller\Admin\WorkCrudController;
use App\Controller\Admin\EmploiCrudController;
use App\Controller\Admin\DiplomeCrudController;
use App\Controller\Admin\CapacityCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use App\Controller\Admin\InfoContactCrudController;
use App\Controller\Admin\LocalisationCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class AuthorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Author::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addTab('Informations'),
            IdField::new('id')->onlyOnIndex(),
            TextField::new('firstName', 'Prénom')
                ->setColumns(6),
            TextField::new('lastName', 'Nom')
                ->setColumns(6),
            ArrayField::new('job', 'Métiers')
                ->setColumns(12),

            FormField::addTab('Localisation'),
            CollectionField::new('Localisation', 'Localisation')
                ->useEntryCrudForm(LocalisationCrudController::class),

            FormField::addTab('Détails'),
            TextEditorField::new('Citation', 'Citation Home Page')
                ->setColumns(12),
            TextEditorField::new('description', 'Description')
                ->setColumns(12),

            FormField::addTab('Compétences'),
            CollectionField::new('capacity', 'Compétences')
                ->useEntryCrudForm(CapacityCrudController::class),
            CollectionField::new('toDos', 'Ce que je sais faire')
                ->useEntryCrudForm(ToDoCrudController::class),

            FormField::addTab('Mon Parcours'),
            CollectionField::new('emplois', 'Mes Emplois')
                ->useEntryCrudForm(EmploiCrudController::class),
            CollectionField::new('diplomes', 'Mes Diplômes')
                ->useEntryCrudForm(DiplomeCrudController::class),

            FormField::addTab('Résultats'),
            CollectionField::new('works', 'Mes Résultats')
                ->useEntryCrudForm(WorkCrudController::class),


        ];
    }
}
