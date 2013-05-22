<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\StoreBundle\Entity\Product;

class StoreController extends Controller
{
    public function indexAction($name)
    {
        return new Response($name);
    }
    
    public function newProductAction()
    {
        $product = new Product();
//        $product->setName('Product1');
//        $product->setPrice(10.3);
//        $product->setDescription('dasdas sadasdsdas dasdasdasdasd');
//        
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($product);
//        $em->flush();
//        
//        return new Response('Storage product Id: ' . $product->getId());
        $form = $this->createFormBuilder($product)
                ->add('name', 'text')
                ->add('price', 'text')
                ->add('description', 'textarea')
                ->getForm();
        
        return $this->render('AcmeStoreBundle:Product:newProduct.html.twig', array('form' => $form->createView()));
    }
    
    public function showProductAction($id)
    {
        $product = $this->getDoctrine()
                ->getRepository('AcmeStoreBundle:Product')
                ->find($id);
        if(!$product)
        {
            throw $this->createNotFoundException('No found product with id: ' . $id);
        }
        
        return $this->render('AcmeStoreBundle:Product:product.html.twig', array('product' => $product));
    }
    
    public function updateProductAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()
                ->getRepository('AcmeStoreBundle:Product')
                ->find($id);
        if(!$product)
        {
            throw $this->createNotFoundException('No found product with id: ' . $id);
        }
        
        $product->setName('Product ' . $id);
        $em->flush();
        
        return $this->redirect($this->generateUrl('show_product', array('id' => $id)));
    }
}

?>
