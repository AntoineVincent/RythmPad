<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;

class UsermodifController extends Controller
{
    public function profilmodifAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $nom = $request->request->get('nom');
        $prenom = $request->request->get('prenom');
        $genre = $request->request->get('genre');
        $promo = $request->request->get('promo');

        $hidden = $request->request->get('hidden');

        $requestinfos = $em->getRepository('AppBundle:User')->findOneById($user->getId());

        if ($hidden == 1){
            if (!empty($nom)) {
                $requestinfos->setNom($nom);
            }
            if (!empty($prenom)) {
                $requestinfos->setPrenom($prenom);
            }
            if (!empty($genre)) {
                $requestinfos->setGenre($genre);
            }
            if (!empty($promo)) {
                $requestinfos->setPromo($promo);
            }
            $em->persist($requestinfos);
            $em->flush();
        }
        return $this->render('default/profilmodif.html.twig', array(
            'requete' => $requestinfos,
        ));   
    }
}