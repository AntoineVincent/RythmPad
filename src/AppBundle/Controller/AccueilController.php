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
        $user = $this->container->get('security.context')->getToken()->getUser();

        $tabalbums = [];

        $amis = $em->getRepository('AppBundle:Ami')->findByIduser($user->getId());

        foreach ($amis as $ami) {

            $albums = $em->getRepository('RythmBundle:Album')->findByIduser($ami->getIdami());

            foreach ($albums as $album) {
                $friend = $em->getRepository('AppBundle:User')->findOneById($ami->getIdami());
                $tabalbums[] = array(
                    'friend' => $friend->getUsername(),
                    'folder' => $album->getFolder(),
                    'titre' => $album->getTitre(),
                    'artiste' => $album->getArtiste(),
                    'genre' => $album->getGenre(),
                    'date' => $album->getDate(),
                    'id' => $album->getId(),
                );
            }
        }


        return $this->render('default/accueil.html.twig', array(
            'tabalbums' => $tabalbums,
        ));
    }
}
