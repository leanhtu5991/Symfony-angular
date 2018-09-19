<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
* @ORM\Entity
* @ORM\Table(name="ticket")
*/
class Ticket{
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;

    /**
    * @ORM\Column(type="integer")
    */
    private $num;

    /**
    * @ORM\Column(type="float")
    */
    private $payTicket;

    /**
    * @ORM\Column(type="float")
    */
    private $payCash;

    /**
    * @ORM\Column(type="float")
    */
    private $payCB;

    /**
    * @ORM\Column(type="float")
    */
    private $total;

    /** 
     * @ORM\Column(type="string", length=100)
     */
    private $date;

    public function __construct()
    {
        
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNum(){
        return $this->num;
    }
    public function setNum($num){
        $this->num = $num;
    }

    public function getPayTicket(){
        return $this->payTicket;
    }
    public function setPayTicket($payTicket){
        $this->payTicket = $payTicket;
    }

    public function getPayCash(){
        return $this->payCash;
    }
    public function setPayCash($payCash){
        $this->payCash = $payCash;
    }

    public function getPayCB(){
        return $this->payCB;
    }
    public function setPayCB($payCB){
        $this->payCB = $payCB;
    }

    public function getTotal(){
        return $this->total;
    }
    public function setTotal($total){
        $this->total = $total;
    }
    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        $this->date = $date;
    }
}