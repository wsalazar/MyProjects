<?php
require_once "bootstrap.php";
$result = $entityManager
				->getConnection()
				->prepare('SELECT lr.hits AS Hits1, nr.hits AS Hits2, (lr.hits + nr.hits) AS TotalHits, 
							lr.uri AS URI, lr.logFile1 AS Log1, lr.logFile2  AS Log2, 
							lr.LogFile3 AS Log3, nr.logFile1 AS Log4, 
							nr.logFile2  AS Log5, nr.LogFile3 AS Log6
							FROM LegacyResults lr 
							INNER JOIN NewResults nr ON lr.uri=nr.uri
						');
$result->execute();
$csvResults = __DIR__ . '/CSVFile.csv';
$csvFile = new SplFileObject($csvResults, 'w');
$csvFile->fputcsv(array('Hits', 'Hits 2', "Total Hits", 'URI','Log1 (yr/mth/day)', 'Log2 (yr/mth/day)', 'Log3 (yr/mth/day)',
						'Log4 (yr/mth/day)', 'Log5 (yr/mth/day)' , 'Log3 (yr/mth/day)'),',');
foreach($result->fetchAll() as $resultSet){
	$info = array($resultSet['Hits1'] , $resultSet['Hits2'] ,
						$resultSet['TotalHits'] , $resultSet['URI'] ,
						$resultSet['Log1'] , $resultSet['Log2'] , 
						$resultSet['Log3'] , $resultSet['Log4'] ,
						$resultSet['Log5'] , $resultSet['Log6']);
	$csvFile->fputcsv($info,',');

	CSVWriter::getInstance()
					->setHits1($resultSet['Hits1'])
					->setHits2($resultSet['Hits2'])
					->setUri($resultSet['URI'])
					->setTotalHits($resultSet['TotalHits'])
					->setLogFiles(
								$resultSet['Log1'],
								$resultSet['Log2'],
								$resultSet['Log3'],
								$resultSet['Log4'],
								$resultSet['Log5'],
								$resultSet['Log6']);

	$inst = clone CSVWriter::getInstance();
	$entityManager->persist($inst);
	$entityManager->flush($inst);
}