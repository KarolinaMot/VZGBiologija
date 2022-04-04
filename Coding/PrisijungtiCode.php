<?php
include_once "connection.php";

function TikrintiDuomenis($conn, $vardas, $slaptazodis){
	
	$sql = "SELECT * FROM Admins";
	$result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
		if($row['Vardas']==$vardas){
			if(password_verify($slaptazodis, $row['Slaptazodis'])){
				$_SESSION['galiKurti'] =$row['GaliKurti'];
				return true;
			}
		}
      }
    }
	return false;
}

function KeistiSlaptazodi($conn, $slaptazodis, $vardas){
	
	$naujasSlaptazodis = password_hash($slaptazodis, PASSWORD_DEFAULT);
	$ID = RastiID($vardas, $conn);

	$sql = "UPDATE Admins SET Slaptazodis='".$naujasSlaptazodis."' WHERE ID='".$ID."'";

	if (mysqli_query($conn, $sql)) {
		
	} else {
		echo '<script>alert("Ups, kažkas negerai su serveriu"); location="../../index.php?puslapis=admin"</script>';
	}
}

function RastiID($vardas, $conn){
	$sql = "SELECT * FROM Admins";
	$result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
		if($row['Vardas']==$vardas){
			return $row['ID'];
		}
      }
    }
	return;
}

function Registruoti($conn, $vardas, $slaptazodis, $galiKurti){
	$naujasSlaptazodis = password_hash($slaptazodis, PASSWORD_DEFAULT);
		if($galiKurti)
		$galiKurti = 1;
		else
		$galiKurti =0;
	$sql = "INSERT INTO Admins (Vardas, Slaptazodis, GaliKurti) VALUES ('".$vardas."','".$slaptazodis."','".$galiKurti."')";

	if (mysqli_query($conn, $sql)) {
	} else {
		echo '<script>alert("Ups, kažkas negerai su serveriu"); location="../../index.php?puslapis=admin"</script>';
	}
}
?>