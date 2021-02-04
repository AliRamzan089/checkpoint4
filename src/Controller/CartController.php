<?php

namespace App\Controller;

use App\Entity\Product;
use App\Service\CartService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/mon-panier", name="cart")
     */
    public function index(CartService $cart): Response
    {
       
        return $this->render('cart/index.html.twig',[
            'cart' => $cart->getAll()
        ]);
    }

    /**
     * @Route("/cart/add/{id}", name="add_to_cart")
     */
    public function add(CartService $cart, $id): Response
    {
        $cart->add($id);

        return $this->redirectToRoute('cart');
    }

     /**
     * @Route("/cart/remove", name="remove_cart")
     */
    public function remove(CartService $cart): Response
    {
        $cart->remove();

        return $this->redirectToRoute('products');
    }
     /**
     * @Route("/cart/delete/{id}", name="delete_to_cart")
     */
    public function delete(CartService $cart, $id): Response
    {
        $cart->delete($id);

        return $this->redirectToRoute('cart');
    }

    /**
    * @Route("/cart/decrease/{id}", name="decrease_to_cart")
    */
    public function decrease(CartService $cart, $id): Response
    {
    $cart->decrease($id);

    return $this->redirectToRoute('cart');
    }
}
