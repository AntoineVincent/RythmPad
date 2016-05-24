<?php

namespace RythmBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use RythmBundle\Entity\Album;
use RythmBundle\Form\AlbumType;

class AlbumController extends Controller
{
    public function newAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();

    	$tests = $em->getRepository('RythmBundle:Album')->findAll();

        $album = new Album();
        $form = $this->createForm('RythmBundle\Form\AlbumType', $album);
        $form->handleRequest($request);

        

        if ($form->isValid()) {
            
            $file = $album->getMusique();

            
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            
            $musiquesDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads/musiques';
            $file->move($musiquesDir, $fileName);

            
            $album->setMusique($fileName);

            $em->persist($album);
        	$em->flush();
        }

        return $this->render('default/newalbum.html.twig', array(
            'form' => $form->createView(),
            'tests' => $tests,
        ));
    }
}