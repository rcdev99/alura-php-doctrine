<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

//Permite acesso ao repositório de alunos
$alunoRepository = $entityManager->getRepository(Aluno::class);

/**
 * @var Aluno[] $alunoList
 */
$alunoList = $alunoRepository->findAll();

//Exibindo lista de alunos
foreach ($alunoList as $aluno) {
    echo "ID: {$aluno->getId()} | Nome: {$aluno->getNome()}" . PHP_EOL;
}

//buscar um aluno em específico
$umDeterminadoAluno = $alunoRepository->findOneBy([
    'nome' => 'Ricardo Júnior'
]);

var_dump($umDeterminadoAluno);
