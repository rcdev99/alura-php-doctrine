<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$alunoRepository = $entityManager->getRepository(Aluno::class);

//Obtendo valores através dos argumentos passados na invocação do arquivo
$id = $argv[1];
$nomeAtualizado = $argv[2];

//Obtendo aluno do repositórios
$aluno = $alunoRepository->find($id);
$aluno->setNome($nomeAtualizado);

//Peristindo alteração
$entityManager->flush();
