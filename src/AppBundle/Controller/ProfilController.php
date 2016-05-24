<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfilController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function profilAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $request = $em->getRepository('AppBundle:User')->findOneById($user->getId());
        $albums = $em->getRepository('RythmBundle:Album')->findByIduser($user->getId());
        
        return $this->render('default/profil.html.twig', array(
            'requete' => $request,
            'albums' => $albums,
        ));
    }
}