<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Item;
use AppBundle\Entity\Type;

class ItemController extends Controller
{
    /**
     * @Route("/types", name="types")
     */
    public function getTypesAction(Request $request)
    {   
        $arrayCollection = array();
        $item;
        $em = $this->getDoctrine()->getManager();
        $types = $em->getRepository('AppBundle:Type')->findAll();
        //return new JsonResponse(array('name' => 'anhtu'));
        foreach($types as $type) {
            $arrayCollection[] = array(
                'id' => $type->getId(),
                'name' => $type->getType(),
                //'price' => $item->getPrice(),
                //'type' => $item->getType()
                // ... Same for each property you want
            );
       }
        return new JsonResponse($arrayCollection);
    }
    /**
     * @Route("/items/", name="show_items")
     */
     public function getItemsAction(Request $request)
     {   
        $arrayCollection = array();
        $data = json_decode($request->getContent(),true);
        $id_type = intval($data['id']);
        //$id_type = $request->request->get('id');
        $em = $this->getDoctrine()->getManager();
        $items = $em->getRepository('AppBundle:Item')->findBy(array('type' => $id_type ));
        //return new JsonResponse(array('name' => 'anhtu'));
        foreach($items as $item) {
            $arrayCollection[] = array(
                'id' => $item->getId(),
                'quantity'=>1,
                'name' => $item->getName(),
                'price' => $item->getPrice(),
                'type' => $item->getType()
            );
        }
        //return new JsonResponse($id_type['id']);
        return new JsonResponse($arrayCollection);
    }
    /**
     * @Route("/items/{id_type}", name="items")
     */
     public function getFirtsItemsAction(Request $request, $id_type)
     {   
        $arrayCollection = array();
        $em = $this->getDoctrine()->getManager();
        $items = $em->getRepository('AppBundle:Item')->findBy(array('type' => $id_type ));
        foreach($items as $item) {
            $arrayCollection[] = array(
                'id' => $item->getId(),
                'quantity'=>1,
                'name' => $item->getName(),
                'price' => $item->getPrice(),
                'type' => $item->getType()
            );
        }
        return new JsonResponse($arrayCollection);
    }
}
