<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Classe usuario
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class Usuario 
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id")
     */
    private $id;
    
    /**
     * @ORM\Column(name="nome")
     */
    private $nome;
    
    /**
     * @ORM\Column(name="email")
     */
    private $email;
    
    /**
     * @ORM\Column(name="password")
     */
    private $password;
    
    /**
     * @ORM\Column(name="login")
     */
    private $login;
    
    function getId()
    {
        return $this->id;
    }

    function getNome()
    {
        return $this->nome;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getLogin()
    {
        return $this->login;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setLogin($login)
    {
        $this->login = $login;
    }


}
