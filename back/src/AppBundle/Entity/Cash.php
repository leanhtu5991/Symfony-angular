<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
* @ORM\Entity
* @ORM\Table(name="cash")
*/
class Cash{
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;
    /**
    * @ORM\Column(type="float")
    */
    private $value;
    /**
    * @ORM\Column(type="string")
    */
    private $img;

    public function __construct()
    {
        
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getValue(){
        return $this->value;
    }
    public function setValue($value){
        $this->value = $value;
    }
    public function getImg(){
        return $this->img;
    }
    public function setImg($img){
        $this->img = $img;
    }
}