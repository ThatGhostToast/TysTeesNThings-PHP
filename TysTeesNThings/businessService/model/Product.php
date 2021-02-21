<?php
namespace businessService\model;

class Product
{
    private $id;
    private $name;
    private $desc;
    private $price;

    public function __construct($id, $name, $desc, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->desc = $desc;
        $this->price = $price;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getDesc()
    {
        return $this->desc;
    }
    
    public function getPrice()
    {
        return $this->price;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }
    
    public function setPrice($price)
    {
        $this->price = $price;
    }
}

