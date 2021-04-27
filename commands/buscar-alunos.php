<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
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
    $telefones = $aluno
        ->getTelefones()
        ->map(function (Telefone $telefone) {
            return $telefone->getNumero();
        })
        ->toArray();
    echo "ID: {$aluno->getId()} | Nome: {$aluno->getNome()}" . PHP_EOL;
    echo "Telefone(s): " . implode(' , ', $telefones) . PHP_EOL;

}

//buscar um aluno em específico
//$umDeterminadoAluno = $alunoRepository->findOneBy(['nome' => 'Ricardo Júnior']);

//var_dump($umDeterminadoAluno);
