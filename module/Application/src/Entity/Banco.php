<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Classe banco
 * @ORM\Entity
 * @ORM\Table(name="banco")
 */
class Banco {

    /**
     * @ORM\OneToMany(targetEntity="\Application\Entity\Agencia", mappedBy="banco")
     * @ORM\JoinColumn(name="id", referencedColumnName="ban_id")
     */
    protected $agencias;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id")
     */
    protected $id;

    /**
     * @ORM\Column(name="codigo")
     */
    protected $codigo;
    
    /**
     * @ORM\Column(name="cnpj")
     */
    protected $cnpj;

    /**
     * @ORM\Column(name="descricao")
     */
    protected $descricao;

    
    public function __construct() {
        $this->comments = new ArrayCollection();
    }

    function getId() {
        return $this->id;
    }

    function getCnpj() {
        return $this->cnpj;
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    
    function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getAgencias() {
        return $this->agencias;
    }

    public function addAgencias($agencia) {
        $this->agencias[] = $agencia;
    }

}
