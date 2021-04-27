<?php

use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

var_dump($entityManager->getConnection());

