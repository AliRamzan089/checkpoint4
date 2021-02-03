<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/produits", name="products")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $products= $this->entityManager->getRepository(Product::class)->findAll();

        return $this->render('product/index.html.twig',[
            'products' => $products 
        ]);
    }
     /**
     * @Route("/produit/{slug}", name="product")
     */
    public function show($slug): Response
    {
        $product= $this->entityManager->getRepository(Product::class)->findOneBySlug($slug);

        if (!$product) {
            return $this->redirectoRoute('products');
        }
        return $this->render('product/show.html.twig',[
            'product' => $product 
        ]);
    }
}
