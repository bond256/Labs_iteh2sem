﻿<?php
require __DIR__ . '/ConectDB.php';

$id=$_POST['id'];
$name=$_POST['name'];

echo $name;
$sql="INSERT INTO ward (id_ward, name) VALUES(:id_n,:name_n)";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(':id_n'=>$id, 'name_n'=>$name));
?>