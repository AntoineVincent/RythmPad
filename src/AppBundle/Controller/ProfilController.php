<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Ami;

class ProfilController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function profilAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $friend = [];
        $amis = "";

        $request = $em->getRepository('AppBundle:User')->findOneById($user->getId());
        $albums = $em->getRepository('RythmBundle:Album')->findByIduser($user->getId());
        $musiques = $em->getRepository('RythmBundle:Musique')->findByIduser($user->getId());

        $abos = $em->getRepository('AppBundle:Ami')->findByIduser($user->getId());

        foreach ($abos as $abo)
        {
            $amis = $em->getRepository('AppBundle:User')->findOneById($abo->getIdami());
            $friend[] = array(
                'username' => $amis->getUsername(),
                'promo' => $amis->getPromo(),
                'prenom' => $amis->getPrenom(),
                'nom' => $amis->getNom(),
            );
        }
        
        return $this->render('default/profil.html.twig', array(
            'requete' => $request,
            'albums' => $albums,
            'musiques' => $musiques,
            'amis' => $amis,
            'friend' => $friend,
        ));
    }
    public function userAction(Request $request, $username)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $request = $em->getRepository('AppBundle:User')->findOneByUsername($username);
        $albums = $em->getRepository('RythmBundle:Album')->findByIduser($request->getId());
        $musiques = $em->getRepository('RythmBundle:Musique')->findByIduser($request->getId());
        $ami = $em->getRepository('AppBundle:Ami')->findOneBy(array('idami' => $request->getId(), 'iduser' => $user->getId()));
        
        return $this->render('default/user.html.twig', array(
            'requete' => $request,
            'albums' => $albums,
            'musiques' => $musiques,
            'ami' => $ami,
            'user' => $user,
        ));
    }
    public function amiAction(Request $request, $username)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $amirequest = new Ami();

        $request = $em->getRepository('AppBundle:User')->findOneByUsername($username);
        $albums = $em->getRepository('RythmBundle:Album')->findByIduser($request->getId());
        $musiques = $em->getRepository('RythmBundle:Musique')->findOneByIduser($request->getId());

        $amirequest->setIduser($user->getId());
        $amirequest->setIdami($request->getId());

        $em->persist($amirequest);
        $em->flush();

        $ami = $em->getRepository('AppBundle:Ami')->findOneByIdami($request->getId());
        
        return $this->render('default/user.html.twig', array(
            'requete' => $request,
            'albums' => $albums,
            'musiques' => $musiques,
            'ami' => $ami,
            'user' => $user,
        ));
        
    }
}