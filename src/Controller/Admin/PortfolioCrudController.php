<?php

namespace App\Controller\Admin;

use App\Entity\Portfolio;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PortfolioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Portfolio::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            ImageField::new('imageName', 'Image')
                ->setBasePath('assets/images/gallery')
                ->onlyOnIndex(),
            TextField::new('titre', 'titre'),
            TextField::new('source', 'source'),
            TextField::new('imageFile','Image')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),
        ];
    }
    
}
