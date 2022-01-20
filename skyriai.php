<?php
	include_once "Coding/SkyriusCode.php";
	include_once "header.php";

	function SearchByClass($conn, $klase){
		$sql = "SELECT * FROM postas WHERE Klase='".$klase."'";
		$result = $conn->query($sql);
		return $result;
	}

	function FillKonspektusByKlase($conn, $klase){
		$result = SearchByClass($conn, $klase);

		while($row = $result->fetch_assoc()){
			$skyrius = SelectPavadinimas($conn, $row['SkyriusID']);
			if($skyrius == $_GET['skyrius']){
				if($_SESSION['prisijunges']){
					echo "<div class='card cardPadding roundedCorners cardBackground col-3'>
					  <div class='card-img-top cardTop marginTop roundedCorners' alt='Card image cap'><h2>".$row['Pavadinimas']."</h2></div>
					  <div class='card-body'>
						<h5 class='card-title'>".$row['Pavadinimas']."</h5>
						<p class='card-text'><b>Klasė: </b>".$row['Klase']."</p>
						<p class='card-text'><b>Skyrius: </b>".$skyrius."</p>
							<div class='row'>
							<div class='col'><a href='article.php?article=".$row['Pavadinimas']."' class='btn btn-dark' style='Width:100%;'>Plačiau</a></div>
							<form class='col' action='Coding/POST/removeArticlePost.php' method='post'>
								<input type='hidden' value='".$row['Pavadinimas']."' name='pavadinimas'>
								<button class='btn btn-danger' type='submit' style='Width:100%;' name='trinti'>Trinti</button>
							</form>
							</div>
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
					  </div>
					</div>";
				}
				
			}
		}
	}
?>
 <link rel="stylesheet" href="style.css">
	<div class="container">
		<?php 
			$result = SearchByClass($conn, "Pirmokams");
			$tinkamas = false;
			$skyriausID = SelectID($conn, $_GET['skyrius']);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					if($row['SkyriusID'] ==$skyriausID ){
						$tinkamas=true;
					}
						
				}
				if($tinkamas){
		?>
			<h3>Pirmokų konspektai</h3>
			<div class="row darkGrayBckgrnd roundedCorners">
				<?php 
					FillKonspektusByKlase($conn, "Pirmokams");
				?>
			</div>
		<?php }}?>

		<?php 
			$result = SearchByClass($conn, "Antrokams");
			$tinkamas = false;
			$skyriausID = SelectID($conn, $_GET['skyrius']);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					if($row['SkyriusID'] ==$skyriausID )
						$tinkamas=true;
				}
				if($tinkamas){
		?>
			<h3>Antrokų konspektai</h3>
			<div class="row darkGrayBckgrnd roundedCorners">
				<?php 
					FillKonspektusByKlase($conn, "Antrokams");
				?>
			</div>
		<?php }}?>

		<?php 
			$result = SearchByClass($conn, "Trečiokams");
			$tinkamas = false;
			$skyriausID = SelectID($conn, $_GET['skyrius']);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					if($row['SkyriusID'] ==$skyriausID )
						$tinkamas=true;
				}
				if($tinkamas){
		?>
			<h3>Trečiokų konspektai</h3>
			<div class="row darkGrayBckgrnd roundedCorners">
				<?php 
					FillKonspektusByKlase($conn, "Trečiokams");
				?>
			</div>
		<?php }}?>

		<?php 
			$result = SearchByClass($conn, "Ketvirtokams");
			$tinkamas = false;
			$skyriausID = SelectID($conn, $_GET['skyrius']);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					if($row['SkyriusID'] ==$skyriausID )
						$tinkamas=true;
				}
				if($tinkamas){
		?>
			<h3>Ketvirtokų konspektai</h3>
			<div class="row darkGrayBckgrnd roundedCorners">
				<?php 
					FillKonspektusByKlase($conn, "Ketvirtokams");
				?>
			</div>
		<?php }}?>
	</div>
<?php include_once "footer.php"; ?>