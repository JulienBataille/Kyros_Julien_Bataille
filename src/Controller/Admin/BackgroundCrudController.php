<?php

namespace App\Controller\Admin;

use App\Entity\Background;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BackgroundCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Background::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            ImageField::new('imageName', 'Image')
                ->setBasePath('assets/images/background')
                ->onlyOnIndex(),
            TextField::new('titre', 'titre'),
            TextField::new('source', 'source'),
            TextField::new('imageFile','Image')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),
        ];
    }
}
