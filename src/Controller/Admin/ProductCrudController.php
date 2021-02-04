<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        if (Crud::PAGE_INDEX === $pageName || Crud::PAGE_DETAIL === $pageName) {
            return [
            TextField::new('name', 'nom'),
            SlugField::new('slug')->setTargetFieldName('name'),
            ImageField::new('firstPicture', 'Image principale')
            ->setFormType(PictureType::class),
            ImageField::new('secondPicture', 'Image secondaire'),
            ImageField::new('thirdPicture', 'Autre image'),
            TextareaField::new('description'),
            AssociationField::new('category', 'Catégorie'),
            MoneyField::new('price', 'Prix')->setCurrency('EUR'),
        ];
        }elseif (Crud::PAGE_EDIT === $pageName || Crud::PAGE_NEW === $pageName){
            return [
            TextField::new('name', 'nom'),
            SlugField::new('slug')->setTargetFieldName('name'),
            UrlField::new('firstPicture', 'Image principale'),
            UrlField::new('secondPicture', 'Image secondaire'),
            UrlField::new('thirdPicture', 'Autre image'),
            TextareaField::new('description'),
            AssociationField::new('category', 'Catégorie'),
            MoneyField::new('price', 'Prix')->setCurrency('EUR')
            ];
        };
    }
    
}
