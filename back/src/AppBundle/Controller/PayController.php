<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Item;
use AppBundle\Entity\Type;
use AppBundle\Entity\Ticket;
use AppBundle\Entity\ItemsSell;
class PayController extends Controller
{
    /**
    * @Route("/ticket/", name="add_ticket")
    */
    public function addTicketAction(Request $request)
    {   
        if($request->getMethod()=='POST')
        {
            $arrayCollection = array();
            $em = $this->getDoctrine()->getManager();
            $data = json_decode($request->getContent(),true);
            $ticket = $em->getRepository('AppBundle:Ticket')->findAll();
            $id = count($ticket);
            $ticket = $em->getRepository('AppBundle:Ticket')->findOneBy(array('id' => $id));
            $num_ticket = $ticket->getNum();
           
            $ticket = new Ticket();
            $ticket->setPayCB($data['pay_CB']);
            $ticket->setPayCash($data['pay_Cash']);
            $ticket->setPayTicket($data['pay_Ticket']);
            $ticket->setTotal($data['total']);
            $ticket->setNum($data['num']);
            $date = new \DateTime();
            $date = $date->format('Y-m-d H:i:s');
            $ticket->setDate($date);
            
            $em->persist($ticket);
            $em->flush();
            return new JsonResponse(array('name' => $data['pay_CB']));
        }
    }
    /**
    * @Route("/itemsSell/{idTicket}", name="add_itemsSell")
    */
    public function addItemsSellAction(Request $request, $idTicket)
    {   
        
            //return new JsonResponse(array('name' => 'anhtu'));
            $arrayCollection = array();
            $data = json_decode($request->getContent(),true);
            $em = $this->getDoctrine()->getManager();
            
            $ticket = $em->getRepository('AppBundle:Ticket')->findOneBy(array('id'=>$idTicket));
            $em = $this->getDoctrine()->getManager();
            for($i=0; $i<sizeof($data); $i++){
                
                $item = $em->getRepository('AppBundle:Item')->findOneBy(array('id'=>$data[$i]['id']));
                $itemsSell = new ItemsSell();
                $itemsSell->addItem($item);
                $itemsSell->setQuantity($data[$i]['quantity']);
                $itemsSell->addTicket($ticket);
                $em->persist($itemsSell);
                $em->flush();
            }
            //return new Response($ticket->getNum());
            return new Response('ok2');
            //return new JsonResponse(array('name' => $ticket->getId() ));
        
    //return new JsonResponse($id_type['id']);
   
    }
}