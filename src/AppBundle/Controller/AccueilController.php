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

        $tabalbums = [];

        $albums = $em->getRepository('RythmBundle:Album')->findAll();

        foreach ($albums as $album) {
            $user = $em->getRepository('AppBundle:User')->findOneById($album->getIduser());
            $tabalbums[] = array(
                'user' => $user->getUsername(),
                'folder' => $album->getFolder(),
                'titre' => $album->getTitre(),
                'artiste' => $album->getArtiste(),
                'genre' => $album->getGenre(),
                'date' => $album->getDate(),
                'id' => $album->getId(),
            );
        }

        return $this->render('default/accueil.html.twig', array(
            'tabalbums' => $tabalbums,
        ));
    }
}
