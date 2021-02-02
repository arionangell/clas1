<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBunde\Request\ParamFecherInterface;
use App\Repository\ProductoRepository;
use App\Entity\Producto;

class ProductosController extends AbstractController
{

    /**
     * @Route("/product", name="create_product")
     */
  public function createProducto(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Producto();
        $product->setName('mani');
        $product->setValor(1964);
       
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }
 
   /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show(int $id): Response
    {
        $product = $this->getDoctrine()
            ->getRepository(Producto::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No Existe este ID '.$id
            );
        }

        return new Response('El producto es : '.$product->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
}
