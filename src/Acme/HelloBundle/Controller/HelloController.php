<?php
namespace Acme\HelloBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeHelloBundle:Hello:index.html.twig',
                                array('name' => $name)
                            );
    }
    
    public function  testAction($color, $name)
    {
        return new Response(sprintf('<html><body>Hello %s - %s </body></html>', $color, $name));
    }
    
    public function helloRedirectAction()
    {
        return $this->redirect($this->generateUrl('acme_hello_test', array('name' => 'dasdas')));
    }
}

?>
