<?php

namespace Alura\Doctrine\Repository;

use Alura\Doctrine\Entity\Aluno;
use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository 
{
    public function buscarAlunosPorCursos()
    {
        $entityManager = $this->getEntityManager();
        $classeAluno = Aluno::class;
        $dql = "SELECT aluno, telefones, cursos 
                FROM $classeAluno aluno
                JOIN aluno.telefones telefones
                JOIN aluno.cursos cursos";
        $query = $entityManager->createQuery($dql);

        return $query->getResult();
    }
}
