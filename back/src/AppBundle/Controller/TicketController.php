<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;

use AppBundle\Entity\Ticket;

class TicketController extends Controller
{
    /**
     * @Route("/findTicket", name="getTicket")
     */
     public function getTicket(Request $request)
     {   
         $em = $this->getDoctrine()->getManager();
         $ticket = $em->getRepository('AppBundle:Ticket')->findAll();
         //return new JsonResponse(array('name' => 'anhtu'));
         $id = count($ticket);
         $ticket = $em->getRepository('AppBundle:Ticket')->findOneBy(array('id' => $id));
         $num_ticket = $ticket->getNum();
         return new JsonResponse(array("numTicket" => $num_ticket, "id_ticket"=>$id));
     }
    /**
     * @Route("/tickets", name="getTickets")
     */
    public function getAllTicket(Request $request)
    {   
        $arrayCollection = array();
        $em = $this->getDoctrine()->getManager();
        $date = new \DateTime();
        $date = $date->format('Y-m-d');
        $date = $date.'%';
        $sql = "SELECT * FROM ticket WHERE date LIKE"." '%$date'";
        $statement = $em->getConnection()->prepare($sql);
        $statement->execute();
        $tickets = $statement->fetchAll();
        //$tickets = $em->getRepository('AppBundle:Ticket')->findBy(array('date' => $date ));
        //$tickets = $em->getRepository('AppBundle:Ticket')->findBy(array('id' => 60 ));
        //return new JsonResponse(array('name' => 'anhtu'));
        // foreach($tickets as $ticket) {
        //     $arrayCollection[] = array(
        //         'id' => $ticket->getId(),
        //         'total' => $ticket->getTotal(),
        //     );
        // }
        return new JsonResponse($tickets);
    }
    /**
     * @Route("/tickets1/{date}", name="getTickets1")
     */
     public function getAllTicket1(Request $request, $date)
     {   
        $em = $this->getDoctrine()->getManager();
        $sql = "SELECT * FROM ticket WHERE date LIKE"." '$date%'";
        $statement = $em->getConnection()->prepare($sql);
        $statement->execute();
        $tickets = $statement->fetchAll();
        return new JsonResponse($tickets);
     }
}