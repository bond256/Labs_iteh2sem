<?php
require __DIR__ . '/ConectDB.php';

    $names=$_POST['ward_select'];
$sql="SELECT ward.name FROM nurse JOIN nurse_ward ON nurse.id_nurse=nurse_ward.fid_nurse JOIN ward ON nurse_ward.fid_ward=ward.id_ward WHERE nurse.name=:names";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':names', $names);
$stmt->execute();
?>


<table>
    <thead>
                <th>NameWard</th>
            </thead>
    <tbody>
        <?php while ($row = $stmt -> fetch(PDO::FETCH_NUM)) { ?>
            <tr>
                <?php foreach ($row as $col_value) { ?>
                    <td><?php echo $col_value ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
