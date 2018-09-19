<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
* @ORM\Entity
* @ORM\Table(name="item")
*/
class Item{
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;
    /**
    * @ORM\Column(type="string", length=1000)
    */
    private $name;
    /**
    * @ORM\Column(type="float")
    */
    private $price;

    /**
     * @var \AppBundle\Entity\Type
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Type")
     * @ORM\JoinColumn(name="id_type", referencedColumnName="id")
     */
    private $type;

    public function __construct()
    {
        $this->type = new ArrayCollection();
    }

    public function addType(\AppBundle\Entity\Type $type)
    {
        $this->type = $type;    
        return $this;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price = $price;
    }

    public function getType(){
        return $this->type;
    }
    public function setType($type){
        $this->type = $type;
    }

}