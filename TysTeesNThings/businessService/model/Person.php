<?php
namespace businessService\model;

class Person
{
    private $id;
    private $name;
    private $username;
    private $email;
    private $role;

    public function __construct($id, $name, $username, $email, $role)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getRole()
    {
        return $this->role;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
}

