<?php

namespace App\Controller;

use Stripe\Stripe;
use App\Service\CartService;
use Stripe\Checkout\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StripeController extends AbstractController
{
    /**
     * @Route("/commande/create-session", name="create_session")
     */

    public function index(CartService $cart): Response
        {
            
            Stripe::setApiKey('sk_test_51IHNz1IqdCTvSECbUZXf8mIutqcbFShL8Xd0I4jDSvTRk3Bwpmdd6E4xm0Lqns7DXZ2KQydb3av5sDGR7pUVbcqU00lPBGYKEz');

            $YOUR_DOMAIN = 'http://127.0.0.1:8000';

            $product_for_stripe[]=[];

            foreach ($cart->getAll() as $product) {
               $product_for_stripe=[
                   'price_data' => [
                       'currency' => 'eur',
                       'unit_amount' => $product['product']->getPrice(),
                       'product_data' => [
                           'name' => $product['product']->getName(),
                       ],
                    ],
                    'quantity' => $product['quantity'],
                ];

            }
            
                $checkout_session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [$product_for_stripe],
                'mode' => 'payment',
                'success_url' => $YOUR_DOMAIN . '/success.html',
                'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
                ]);
                $response = new JsonResponse (['id' => $checkout_session->id]);
                return $response;
            }
}
