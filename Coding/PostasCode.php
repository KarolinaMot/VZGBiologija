<?php
include_once 'connection.php';

function SelectSkyriusID($conn, $pavadinimas){
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

function SelectKlaseID($conn, $pavadinimas){
	$sql = "SELECT ID FROM klase WHERE Pavadinimas='".$pavadinimas."'";
	$result = $conn->query($sql);
    $result2 =" ";
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $result2 = $row["ID"];
      }
    }
	return $result2;
}

function SelectPostasID($conn, $pavadinimas){
	$sql = "SELECT ID FROM postas WHERE Pavadinimas='".$pavadinimas."'";
	$result = $conn->query($sql);
    $result2 =" ";
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $result2 = $row["ID"];
      }
    }
	return $result2;
}

function InsertToPostas($conn, $pavadinimas, $klaseID, $klase, $failas, $skyriusID, $skyrius){

	$sql = "INSERT INTO postas (Pavadinimas, Failas, KlaseID, SkyriusID, Skyrius, Klase)
	VALUES ('".$pavadinimas."','".$failas."','".$klaseID."','".$skyriusID."','".$skyrius."','".$klase."')";

    if (mysqli_query($conn, $sql)) {
		 echo '<script>alert("Postas sėkmingai sukurtas")</script>';
	}
}

function SearchByClass($conn, $klase){
    $sql = "SELECT * FROM postas WHERE Klase='".$klase."'";
    $result = $conn->query($sql);
    
    return $result;
}

function SearchBySkyrius($conn, $skyrius){

    $sql = "SELECT * FROM postas WHERE Skyrius='".$skyrius."'";
    $result = $conn->query($sql);
    
    return $result;
}

function SearchByKlase($conn, $klase){
	$sql = "SELECT * FROM postas WHERE klase='".$klase."'";
    $result = $conn->query($sql);
    
    return $result;
}

function SearchByPavadinimas($conn, $pavadinimas){
	$sql = "SELECT * FROM postas WHERE Pavadinimas='".$pavadinimas."'";
    $result = $conn->query($sql);
	$result2 = Array();
    if($row = $result->fetch_assoc()){
		$result2[0] = $row['ID'];
		$result2[1] = $row['Pavadinimas'];
		$result2[2] = $row['Failas'];
	}
    return $result2;
}

function FillKonspektusBySkyrius($conn, $skyrius, $klase){

    $result = SearchBySkyrius($conn, $skyrius);
	switch($skyrius){
		case "lastele":
			$skyrius = "Ląstelė";
			break;
		case "paveldejimas":
			$skyrius = "Organizmų paveldėjimas";
			break;
		case "apykaita":
			$skyrius = "Medžiagų apykaita ir pernaša";
			break;
		case "sveikata":
			$skyrius = "Žmogaus sveikata";
			break;
		case "homeostaze":
			$skyrius = "Homeostazė ir valdymas";
			break;
		case "evoliucija":
			$skyrius = "Evoliucija ir sistematika";
			break;
		case "ekologija":
			$skyrius = "Ekologija";
			break;
	}

	while($row = $result->fetch_assoc()){
		if($row["Klase"] == $klase){
			echo '<div class="konspektasCard">
			<div class="konspektasCover"><h3><h3>'.$row["Pavadinimas"].'</h3></h3></div>
			<p><b>Skyrius: </b>'.$skyrius.'</p>
			<p><b>Klasė: </b>'.ucfirst($klase).'</p>
			<a href="index.php?puslapis=article&article='.$row["Pavadinimas"].'"><button>Plačiau</button></a>
			</div>';
		}			
	}
}

function FillKonspektusByKlase($conn, $klase, $skyrius){

    $result = SearchByKlase($conn, $klase);
	echo "<script>alert('".$klase."');</script>";
	echo "<script>alert('vykdoma');</script>";
	switch($skyrius){
		case "lastele":
			$skyrius = "Ląstelė";
			break;
		case "paveldejimas":
			$skyrius = "Organizmų paveldėjimas";
			break;
		case "apykaita":
			$skyrius = "Medžiagų apykaita ir pernaša";
			break;
		case "sveikata":
			$skyrius = "Žmogaus sveikata";
			break;
		case "homeostaze":
			$skyrius = "Homeostazė ir valdymas";
			break;
		case "evoliucija":
			$skyrius = "Evoliucija ir sistematika";
			break;
		case "ekologija":
			$skyrius = "Ekologija";
			break;
	}
	while($row = $result->fetch_assoc()){
		if($row["Skyrius"] == $skyrius){
			echo "<script>alert('rasta');</script>";
			if($klase == "treciokams"){
				$klase="trečiokams";
			}
			else{
				$klase =$row["Klase"];
			}
			echo '<div class="konspektasCard">
				  	<div class="konspektasCover"><h3><h3>'.$row["Pavadinimas"].'</h3></h3></div>
					<p><b>Skyrius: </b>'.$skyrius.'</p>
					<p><b>Klasė: </b>'.ucfirst($klase).'</p>
					<a href="index.php"><button>Plačiau</button></a>
				  </div>';
		}			
	}
}

function DeletePost($conn, $pavadinimas){

	$ID = SelectPostasID($conn, $pavadinimas);
	$sql = "DELETE FROM postas WHERE ID=".$ID;
	$filename = '../../PdfViewer/web/Uploads/'.$pavadinimas.'.pdf';

	if ($conn->query($sql) === TRUE) {
		unlink($filename);
	    		echo "<script type='text/javascript'>
				alert('Postas sėkmingai ištrintas.');
				location='../../index.php?puslapis=admin';
				</script>";
	} else {
	  echo "<script>alert('Postas nebuvo istrintas: '".$conn->error.");
				location='../../pradzia.php';</script>";
	}
}

function FillTable($conn, $result){
	if ($result->num_rows > 0) {
		echo '<tr>
				<th>Pavadinimas</th>
				<th>Skyrius</th>
				<th>Klasė</th>
				<th>Trinti</th>
			  </tr>';
		while($row = $result->fetch_assoc()) {
			echo "<tr>
				<td>".$row["Pavadinimas"]."</td>
				<td>".ucfirst($row["Skyrius"])."</td>
				<td>".ucfirst($row["Klase"])."</td>
				<td><form action='Coding/POST/removeArticlePost.php' method='post'><button id='trinti' type='submit' name='trinti' style='width: 70%; margin-top: 40px;' value='".$row['Pavadinimas']."'>Trinti</button></form></td>
			</tr>";
		}
	}
	else{
		if (isset($_POST['search']))
			echo "<p>Nieko nerasta. <a>Valyti paiešką?</a></p>";
		if (isset($_POST['filter']))
			echo "<p>Nieko nerasta. <a>Valyti filtrą?</a></p>";
	}
}

function SearchAll($conn){
	$sql = "SELECT * FROM postas";
	$result = $conn->query($sql);

	return $result;
}
function SearchByName($conn, $pavadinimas){
	$sql = "SELECT * FROM postas WHERE Pavadinimas LIKE '%".$pavadinimas."%' OR Klase LIKE '%".$pavadinimas."%' OR Skyrius LIKE '%".$pavadinimas."%'";
	$result = $conn->query($sql);

	return $result;
}

function SearchByFilter($conn, $skyrius, $klase){
	if($skyrius == "---" && $klase != "---")
		$sql = "SELECT * FROM postas WHERE Klase LIKE '".$klase."'";
	else if($skyrius != "---" && $klase == "---")
		$sql = "SELECT * FROM postas WHERE Skyrius LIKE '".$skyrius."'";
	else if($skyrius != "---" && $klase != "---")
		$sql = "SELECT * FROM postas WHERE Skyrius LIKE '".$skyrius."' AND klase LIKE '".$klase."'";
	else{
		$sql = "SELECT * FROM postas";
		echo "<script>alert('Nepasirinkti filtravimo raktai.')</script>";
	}

	$result = $conn->query($sql);
	return $result;
}

?>