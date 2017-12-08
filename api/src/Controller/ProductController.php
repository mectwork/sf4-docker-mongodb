<?php
/**
 * Created by PhpStorm.
 * User: Manox
 * Date: 12/7/2017
 * Time: 10:06 PM
 */

namespace App\Controller;


use App\Document\Product;
use Doctrine\ODM\MongoDB\DocumentManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * @Route("/add-product-basic")
     * @return Response
     */
    public function addProductBasic()
    {
        $product = new Product();
        $product->setName("Product A");
        $product->setPrice("25.99");

        /** @var DocumentManager $dm */
        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($product);
        $dm->flush();

        return new Response('Created product id: ' . $product->getId());
    }

}