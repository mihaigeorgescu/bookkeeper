<?php

namespace Custom\CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('Custom1CMSBundle:Default:index.html.twig');
    }
}
