<?php
	include_once "Coding/SkyriusCode.php";
	include_once "Coding/PostasCode.php";
?>
<html>
	<body>
		<div class="parallax" style="margin-top:-24px;">
			<?php include_once "header.php";?>
			<div class="container-fluid blackBckgrnd" height="100%" width="100%">
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
			</div>
		</div>
	</body>
</html>
