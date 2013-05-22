<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @ORM\Column(type="string", length=100)
     */
    protected $name;
    
    /**
     *
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $price;
    
    /**
     *
     * @ORM\Column(type="string", length=512)
     */
    protected $description;
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getPrice()
    {
        return $this->price;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
}

?>
