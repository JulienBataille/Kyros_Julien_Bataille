<?php

namespace App\Controller\Admin;

use App\Entity\Capacity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CapacityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Capacity::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('capacities', 'Compétence')
                ->setColumns(12),
            NumberField::new('percentage', 'Votre niveau')
                ->setColumns(12)
                ->setHelp('Pourcentage de la compétence'),
        ];
    }
}
