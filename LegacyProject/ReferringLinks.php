<?php
require_once "bootstrap.php";
require_once "DoctrineLib/CSVReadFile.php";
$csv = __DIR__  . '/' . $argv[1];
$className = $argv[2];
$fileRead = new DoctrineLib\CSVReadFile($csv);

$fileRead->rewind();
while($fileRead->valid()){
	$row = $fileRead->current();
	echo "Uri " . $row[0] . " Referring Site " . $row[1] . "\n";
	$className::getInstance()
			->setUri($row[0])
			->setReferringURI($row[1]);
	$instance = clone $className::getInstance();
	$entityManager->persist($instance);
	$entityManager->flush();
	$fileRead->next();
}
