<?php
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
require __DIR__ . '/ConectDB.php';

$name=$_GET['name_nurse'];
$ward=$_GET['name_ward'];

echo json_encode($name);
$sql1 = "SELECT id_nurse FROM nurse WHERE name=:names ";
$stmt1 = $dbh->prepare($sql1);
$stmt1->bindParam(':names', $name);
$stmt1->execute();
$row1=$stmt1->fetch();
$sql2 = "SELECT id_ward FROM ward WHERE name=:wards";
$stmt2 = $dbh->prepare($sql2);
$stmt2->bindParam(':wards', $ward);
$stmt2->execute();
$row2=$stmt2->fetch();

$sql="INSERT INTO nurse_ward (fid_nurse, fid_ward) VALUES(:id_nurse,:name_ward)";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(':id_nurse'=>$row1['id_nurse'], 'name_ward'=>$row2['id_ward']));

?>