<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            ImageField::new('imageName', 'Image')
                ->setBasePath('assets/images/blog')
                ->onlyOnIndex(),
            TextField::new('title', 'titre'),
            TextEditorField::new('description', 'texte'),
            TextField::new('imageFile','Image')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),
        ];
    }
    
}
