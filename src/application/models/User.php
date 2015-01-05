<?php

class Model_User 
{
    
    /**
     * Identifiant utilisateur
     * @var Integer
     */
    private $id;
    
    /**
     * Login
     * @var String
     */    
    private $login;
    
    /**
     * Password
     * @var String
     */    
    private $password;
    
    /**
     * Email
     * @var String
     */
    private $email;
    
    /**
     * Date
     * @var Zend_Date
     */
    private $created;
    
	/**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

	/**
     * @return the $login
     */
    public function getLogin()
    {
        return $this->login;
    }

	/**
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }

	/**
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }

	/**
     * @return the $created
     */
    public function getCreated()
    {
        return $this->created;
    }

	/**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

	/**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

	/**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

	/**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

	/**
     * @param Zend_Date $created
     */
    public function setCreated($created)
    {
        $this->created = new Zend_Date($created);
        return $this;
    }
    
}

