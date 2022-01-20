<?php
include_once 'connection.php';

function CheckIfExists($conn, $pavadinimas){
	$result = false;

	$sql = "Select * FROM skyrius";
	$result2 = $conn->query($sql);

	while($row = $result2->fetch_assoc()) {
        if($row['Pavadinimas'] == $pavadinimas){
			$result=true;
		}
    }
	return $result;
}

function SkyriuArray($conn){
	$skyriai = Array();
	$sql = "Select * FROM skyrius";
	$result = $conn->query($sql);

	 if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($row['Pavadinimas']!=""){
			array_push($skyriai, $row['Pavadinimas']);
		}
      }
    }

	return $skyriai;
}

function InsertToSkyrius($pavadinimas, $conn){
	$sql = 'INSERT INTO skyrius (Pavadinimas)
	VALUES ("'.$pavadinimas.'")';

	if (mysqli_query($conn, $sql)) {
	} else {
		echo '<script>alert("Ups, kažkas negerai su serveriu")</script>';
	}
}

function FillHeader($conn){
	$result = SkyriuArray($conn);

	if(count($result)<=4){
		for($i=0; $i<count($result); $i++){
			echo '<div class="col" style=" margin-left:2%;"><a style="color: white;" href="skyriai.php?skyrius='.$result[$i].'">'.$result[$i].'</a></div>';
		}
	}
	else{
		for($i=0; $i<4; $i++){
			echo '<div class="col" style=" margin-left:2%;"><a style="color: white;" href="skyriai.php?skyrius='.$result[$i].'">'.$result[$i].'</a></div>';
		}
		echo '
			<div class="dropdown">
			  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Dropdown button
			  </button>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="#">Action</a>
				<a class="dropdown-item" href="#">Another action</a>
				<a class="dropdown-item" href="#">Something else here</a>
			  </div>
			</div>';
	}


	if(!isset($_SESSION['prisijunges']) || !$_SESSION['prisijunges']){
		echo '<div class="col" style=" margin-left:2%;"><a style="color: white;" href="prisijungti.php">Prisijungti</a></div>';

	}
	else if($_SESSION['prisijunges']){
		echo '<div class="col" style=" margin-left:2%;"><a style="color: white;" href="admin.php">Admin</a></div>';

	}
}

function SelectID($conn, $pavadinimas){
	$sql = "SELECT ID FROM skyrius WHERE Pavadinimas='".$pavadinimas."'";
	$result = $conn->query($sql);
    $result2 =" ";
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $result2 = $row["ID"];
      }
    }
	return $result2;
}

function SelectPavadinimas($conn, $id){
	$sql = "SELECT Pavadinimas FROM skyrius WHERE ID='".$id."'";
	$result = $conn->query($sql);
    $result2 =" ";
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $result2 = $row["Pavadinimas"];
      }
    }
	return $result2;
}

function DeleteFromSkyrius($conn, $pavadinimas){

	$ID = SelectID($conn, $pavadinimas);
	$sql = "DELETE FROM skyrius WHERE ID=".$ID;
	if ($conn->query($sql) === TRUE) {
	  echo "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . $conn->error;
	}
}

function FillBody($conn){

	$result = SkyriuArray($conn);
	$sk=0;
	$num = count($result);
	$rowNum = $num / 4;
	$rowNum = ceil($rowNum);
	
	for($j=0; $j<$rowNum; $j++){
		echo '<div class="row">';
		for($i=0; $i<4; $i++){
			if($i !=0){
				echo '<div class="col skyriai margintop marginleft roundedCorners">
					<h3><a style="color: white;" href="skyriai.php?skyrius='.$result[$sk].'">'.strtoupper($result[$sk]).'</a></h3>
				</div>';
				$sk++;
			}
			else{
				echo '<div class="col skyriai margintop roundedCorners">
					<h3><a style="color: white;" href="skyriai.php?skyrius='.$result[$sk].'">'.strtoupper($result[$sk]).'</a></h3>
				</div>';
				$sk++;
			}
			if($sk+1>$num){
				break;
			}
		}
		echo '</div>';
		if($sk+1>$num){
			break;
		}
	}

}

function FillOptions($conn){
	$array = SkyriuArray($conn);

	for($i=0; $i<count($array); $i++){
		echo "<option value='".$array[$i]."'>".$array[$i]."</option>";
	}
}
?>