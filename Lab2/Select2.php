<?php
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
require __DIR__ . '/ConectDB.php';

$sql="SELECT DISTINCT department FROM nurse";
$sth = $dbh->prepare($sql);
$sth->execute();
$timetable = $sth->fetchAll(PDO::FETCH_OBJ);
echo json_encode($timetable);