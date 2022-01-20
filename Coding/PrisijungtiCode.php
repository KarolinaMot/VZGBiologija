<?php
include_once "connection.php";

function TikrintiDuomenis($conn, $vardas, $slaptazodis){
	
	$sql = "SELECT * FROM Admins";
	$result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
		if($row['Vardas']==$vardas){
			if($row['SaugusSlap']==false){
				if($row['Slaptazodis']==$slaptazodis){
					$_SESSION['saugus'] = $row['SaugusSlap'];
					return true;
				}
			}
			else{
				if(password_verify($slaptazodis, $row['Slaptazodis'])){
					$_SESSION['saugus'] = $row['SaugusSlap'];
					return true;
				}
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
	$sql2 = "UPDATE Admins SET SaugusSlap=true WHERE ID='".$ID."'";

	if (mysqli_query($conn, $sql)) {
		if (mysqli_query($conn, $sql2)) {}
		else {echo '<script>alert("Ups, kažkas negerai su serveriu")</script>';}
	} else {
		echo '<script>alert("Ups, kažkas negerai su serveriu")</script>';
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
?>