<?php

namespace Bookkeeper\HelloWorldBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BookkeeperHelloWorldBundle:Default:index.html.twig', array('name' => $name));
    }
}
