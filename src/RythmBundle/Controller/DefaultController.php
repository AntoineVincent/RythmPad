<?php

namespace RythmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RythmBundle:Default:index.html.twig');
    }
}
