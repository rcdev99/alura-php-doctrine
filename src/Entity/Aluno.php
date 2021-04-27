<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 */
class Aluno
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $nome;
    /**
     * @OneToMany(targetEntity="Telefone", mappedBy="aluno", cascade={"remove","persist"})
     */
    private $telefones;

    public function __construct()
    {
        $this->telefones = new ArrayCollection();
        
    }

    public function getId() :int
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome(string $nome) 
    {
        $this->nome = $nome;
    }

    /**
     * @var Telefone $telefones
     */
    public function getTelefones() : Collection
    {
        return $this->telefones;
    }

    public function addTelefone(Telefone $telefone) : self
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
        return $this;
    }

}
