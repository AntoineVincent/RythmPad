<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AccueilController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function accueilAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $tests = $em->getRepository('RythmBundle:Album')->findAll();

        return $this->render('default/accueil.html.twig', array(
            'tests' => $tests,
        ));
    }
}
