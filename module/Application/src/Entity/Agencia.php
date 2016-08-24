<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe banco
 * @ORM\Entity
 * @ORM\Table(name="agencia")
 */
class Agencia {

    /**
     * @ORM\ManyToOne(targetEntity="\Application\Entity\Banco", inversedBy="agencia")
     * @ORM\JoinColumn(name="ban_id", referencedColumnName="id")
     */
    protected $banco;

    /*
     * Returns associated post.
     * @return \Application\Entity\Banco
     */

    public function getBanco() {
        return $this->banco;
    }

    /**
     * Sets associated post.
     * @param \Application\Entity\Banco $banco
     */
    public function setBanco($banco) {
        $this->banco = $banco;
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id")
     */
    protected $id;

    /**
     * @ORM\Column(name="ban_id")
     */
    protected $ban_id;

    /**
     * @ORM\Column(name="nome")
     */
    protected $nome;

    /**
     * @ORM\Column(name="endereco")
     */
    protected $endereco;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

}
