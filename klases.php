<?php
	include_once "Coding/PostasCode.php";
	include_once "Coding/SkyriusCode.php";
	$klase = $_GET['klase'];?>
<html>
	<body>
		<div class="parallax">
			<?php include_once "header.php";?>
			<div class="container-fluid blackBckgrnd" height="100%" width="100%">
				<div class="container">
					<?php
						$skyriai = SkyriuArray($conn);
						for($i=0; $i<count($skyriai); $i++){
							$result = 0;
							$sql ="SELECT * FROM postas WHERE Skyrius='".$skyriai[$i]."'";
							$result2 = $conn->query($sql);

							while($row = $result2->fetch_assoc()) {
								if($row["Klase"] == $klase){
									$result=1;
								}
							}
							if($result == 1){
								echo "<h3>".$skyriai[$i]."</h3>";
								echo "<div class='row darkGrayBckgrnd roundedCorners'>";
									FillKonspektusBySkyrius($conn, $skyriai[$i], $klase);					 
								echo "</div>";
							}
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>