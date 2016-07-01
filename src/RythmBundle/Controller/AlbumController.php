<?php

namespace RythmBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use RythmBundle\Entity\Album;
use RythmBundle\Form\AlbumType;
use RythmBundle\Entity\Musique;
use RythmBundle\Form\MusiqueType;

class AlbumController extends Controller
{
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $album = new Album();
        $form = $this->createForm('RythmBundle\Form\AlbumType', $album);
        $form->handleRequest($request);

        

        if ($form->isValid()) {

            $photo = $album->getFolder();

            $photoName = md5(uniqid()).'.'.$photo->guessExtension();
            $photoDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads/folders';
            $photo->move($photoDir, $photoName);

            $album->setFolder($photoName);

            $album->setIduser($user->getId());

            $em->persist($album);
            $em->flush();
        }

        return $this->render('default/newalbum.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $tests = $em->getRepository('RythmBundle:Album')->findByIduser($user->getId());

        return $this->render('default/listalbum.html.twig', array(
            'tests' => $tests,
        ));
    }
    public function pageAction(Request $request, $titre)
    {
        $em = $this->getDoctrine()->getManager();
        $test = $em->getRepository('RythmBundle:Album')->findOneByTitre($titre);
        $musiques = $em->getRepository('RythmBundle:Musique')->findByIdalbum($test->getId());
        $userad = $em->getRepository('AppBundle:User')->findOneById($test->getIduser());

        return $this->render('default/albumpage.html.twig', array(
            'test' => $test,
            'musiques' => $musiques,
            'userad' => $userad,
        ));
    }
    public function musiqueAction(Request $request, $idalbum)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $album = $em->getRepository('RythmBundle:Album')->findOneById($idalbum);

        $musique = new Musique();
        $form = $this->createForm('RythmBundle\Form\MusiqueType', $musique);
        $form->handleRequest($request);

        

        if ($form->isValid()) {

            $morceau = $musique->getMusique();

            $morceauName = md5(uniqid()).'.'.$morceau->guessExtension();
            $morceauDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads/musiques';
            $morceau->move($morceauDir, $morceauName);

            $musique->setMusique($morceauName);

            $musique->setIduser($user->getId());
            $musique->setIdalbum($album->getId());

            $em->persist($musique);
            $em->flush();
        }

        return $this->render('default/newmusique.html.twig', array(
            'form' => $form->createView(),
            'album' => $album,
        ));
    }
}