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
		 echo '<script>alert("New record created successfully")</script>';
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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

	while($row = $result->fetch_assoc()){
		if($row["Klase"] == $klase){
			if(!$_SESSION['prisijunges']){
				echo "<div class='card cardPadding roundedCorners cardBackground col-3'>
				  <div class='card-img-top cardTop marginTop roundedCorners' alt='Card image cap'><h2>".$row['Pavadinimas']."</h2></div>
				  <div class='card-body'>
					<h5 class='card-title'>".$row['Pavadinimas']."</h5>
					<p class='card-text'><b>Klasė: </b>".$row['Klase']."</p>
					<p class='card-text'><b>Skyrius: </b>".$skyrius."</p>
					<a href='article.php?article=".$row['Pavadinimas']."' class='btn btn-dark' style='Width:100%;'>Plačiau</a>
				  </div>
				</div>";
			}	
			else{
				echo "<div class='card cardPadding roundedCorners cardBackground col-3'>
				  <div class='card-img-top cardTop marginTop roundedCorners' alt='Card image cap'><h2>".$row['Pavadinimas']."</h2></div>
				  <div class='card-body'>
					<h5 class='card-title'>".$row['Pavadinimas']."</h5>
					<p class='card-text'><b>Klasė: </b>".$row['Klase']."</p>
					<p class='card-text'><b>Skyrius: </b>".$skyrius."</p>
					<a href='article.php?article=".$row['Pavadinimas']."' class='btn btn-dark' style='Width:100%;'>Plačiau</a>
					<a href='Coding/POST/removeArticlePost?article=".$row['Pavadinimas']."' class='btn btn-danger' style='Width:100%; margin-top:10px;'>Trinti</a>
				  </div>
				</div>";
			}
		}			
	}
}

function FillKonspektusByKlase($conn, $klase, $skyrius){

    $result = SearchByKlase($conn, $klase);

	while($row = $result->fetch_assoc()){
		if($row["Skyrius"] == $skyrius){
			echo '<div class="konspektasCard">
				  	<div class="konspektasCover"><h3><h3>'.$row["Pavadinimas"].'</h3></h3></div>
					<p><b>Skyrius: </b>'.ucfirst($row["Skyrius"]).'</p>
					<p><b>Klasė: </b>'.ucfirst($row["Klase"]).'</p>
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
				location='../../pradzia.php';
				</script>";
	} else {
	  echo "<script>alert('Postas nebuvo istrintas: '".$conn->error.");
				location='../../pradzia.php';</script>";
	}
}

function FillTable($conn){
	$sql = "SELECT * FROM postas";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<tr>
				<td>".$row["Pavadinimas"]."</td>
				<td>".ucfirst($row["Skyrius"])."</td>
				<td>".ucfirst($row["Klase"])."</td>
				<td><button id='redaguoti' type='submit' name='redaguoti' style='width: 100%; margin-top: 20px;'>Redaguoti</button></td>
				<td><button id='trinti' type='submit' name='trinti' style='width: 100%; margin-top: 20px;'>Trinti</button></td>
			</tr>";
		}
	}
}

?>