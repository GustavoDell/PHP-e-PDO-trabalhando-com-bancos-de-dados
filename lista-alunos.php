<?php

require 'vendor/autoload.php';
 
use Alura\Pdo\Domain\Model\Student;

$dataBasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $dataBasePath);

$statement = $pdo->query('SELECT * FROM students;');
//PDO::FETCH_ASSOC parametro para alterar style da exibição dos dados, onde o indice fica como o nome da coluna. Mais conhecido como(array associativo)
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

foreach ($studentDataList as $studentData) {
    $studentList[] = new Student($studentData['id'], $studentData['name'], new \DateTimeImmutable($studentData['birth_date']));
}

var_dump($studentList);
