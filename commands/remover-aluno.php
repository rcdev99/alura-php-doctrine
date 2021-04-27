<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$alunoRepository = $entityManager->getRepository(Aluno::class);

//Obtendo valores através dos argumentos passados na invocação do arquivo
$id = $argv[1];

//Obtendo através de referência
$aluno = $entityManager->getReference(Aluno::class, $id);

$entityManager->remove($aluno);
$entityManager->flush();