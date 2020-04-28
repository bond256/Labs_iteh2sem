<?php
require __DIR__ . '/ConectDB.php';


$sql1 = "SELECT name FROM nurse";
$stmt1 = $dbh->prepare($sql1);
$stmt1->execute();
$sql2 = "SELECT DISTINCT department FROM nurse";
$stmt2 = $dbh->prepare($sql2);
$stmt2->execute();
$sql3 = "SELECT DISTINCT shift FROM nurse";
$stmt3 = $dbh->prepare($sql3);
$stmt3->execute();


?>

<h1>Get ward</h1>
<form method="post" action="add1.php">
    nurse <br/>
    <select name="ward_select"> 
    <option value=""</option>
    <?php    
    while ($row = $stmt1->fetch()) { 
        echo "<option value='".$row['name']."'>".$row['name']."</option>";
    }
    ?>
    </select>
    <br/>
<input type="submit" name="submit" value="Get" />
</form>


<h1>Get nurse</h1>
<form method="post" action="add2.php">
    department <br/>
    <select name="depart_select"> 
    <option value=""</option>
    <?php    
    while ($row = $stmt2->fetch()) { 
        echo "<option value='".$row['department']."'>".$row['department']."</option>";
    }
    ?>
    </select>
    <br/>
<input type="submit" name="submit" value="Get" />
</form>

<h1>get duty</h1>
<form method="post" action="add3.php">
    shift <br/>
    <select name="duty_select"> 
    <option value=""</option>
    <?php    
    while ($row = $stmt3->fetch()) { 
        echo "<option value='".$row['shift']."'>".$row['shift']."</option>";
    }
    ?>
    </select>
    <br/>
<input type="submit" name="submit" value="Get" />

</form>