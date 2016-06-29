<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use RythmBundle\Entity\Album;

class SearchController extends Controller
{
    public function albumAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $string = $this->getRequest()->request->get('recherche');

        $listalbum = $em->getRepository('RythmBundle:Album')->myFind($string);

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($listalbum, 'json');

        $response = new Response($jsonContent);
        return $response;
    }
}
