<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$alunosRepository = $entityManager->getRepository(Aluno::class);


/**@var Aluno[] $alunos*/
$alunos = $alunosRepository->findAll();

//Exibindo lista de alunos
foreach ($alunos as $aluno) {
    $telefones = $aluno
        ->getTelefones()
        ->map(function (Telefone $telefone) {
            return $telefone->getNumero();
        })
        ->toArray();
    echo "ID: {$aluno->getId()} | Nome: {$aluno->getNome()}" . PHP_EOL;
    echo "Telefone(s): " . implode(' , ', $telefones) . PHP_EOL;

    $cursos = $aluno->getCursos();

    foreach ($cursos as $curso) {
        echo "\tID Curso: {$curso->getId()} |" ;
        echo "\tCurso: {$curso->getNome()}" . PHP_EOL;
    }

    echo PHP_EOL;
}