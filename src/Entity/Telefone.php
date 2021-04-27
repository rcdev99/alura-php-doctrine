<?php

namespace Alura\Doctrine\Entity;

/**
 * @Entity
 */
class Telefone
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
    private $numero;

    /**
     * @ManyToOne(targetEntity="Aluno")
     */
    private $aluno;

    //Getters and Setters
    public function getId():int
    {
        return $this->id;
    }

    public function getNumero():string
    {
        return $this->numero;
    }

    public function setNumero(string $numero):void
    {
        $this->numero = $numero;
    }

    public function getAluno(): Aluno
    {
        return $this->aluno;
    }

    public function setAluno(Aluno $aluno):self
    {
        $this->aluno = $aluno;
        return $this;
    }
}