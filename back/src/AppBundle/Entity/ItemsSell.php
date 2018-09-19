<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
* @ORM\Entity
* @ORM\Table(name="items_sell")
*/
class ItemsSell{
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;

    /**
     * @var \AppBundle\Entity\Item
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Item")
     * @ORM\JoinColumn(name="id_item", referencedColumnName="id")
     */
    private $item;

    /**
    * @ORM\Column(type="integer")
    */
    private $quantity;
    
    /**
     * @var \AppBundle\Entity\Ticket
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ticket")
     * @ORM\JoinColumn(name="id_ticket", referencedColumnName="id")
     */
     private $ticket;

    public function __construct()
    {
        $this->item = new ArrayCollection();
        $this->ticket = new ArrayCollection();
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getItem(){
        return $this->item;
    }
    public function setItem(ArrayCollection $item)
    {
        $this->item = $item;    
    }
    public function addItem(\AppBundle\Entity\Item $item)
    {
        $this->item = $item;    
        return $this;
    }

    public function getQuantity(){
        return $this->quantity;
    }
    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    public function getTicket(){
        return $this->ticket;
    }
    public function setTicket(ArrayCollection $ticket)
    {
        $this->ticket = $ticket;    
    }
    public function addTicket(\AppBundle\Entity\Ticket $ticket)
    {
        $this->ticket = $ticket;    
        return $this;
    }

}