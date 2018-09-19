<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Cash;

class CashController extends Controller
{
    /**
     * @Route("/cash", name="getCash")
     */
     public function getTypesAction(Request $request)
     {   
         $arrayCollection = array();
         $item;
         $em = $this->getDoctrine()->getManager();
         $types = $em->getRepository('AppBundle:Cash')->findAll();
         //return new JsonResponse(array('name' => 'anhtu'));
         foreach($types as $type) {
             $arrayCollection[] = array(
                 'id' => $type->getId(),
                 'value' => $type->getValue(),
                 'img'=> $type->getImg(),
                 //'price' => $item->getPrice(),
                 //'type' => $item->getType()
                 // ... Same for each property you want
             );
        }
         return new JsonResponse($arrayCollection);
     }
}