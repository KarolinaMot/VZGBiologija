<?php
	include_once "Coding/PostasCode.php";
	include_once "Coding/SkyriusCode.php";
	include_once "header.php";
	$klase = $_GET['klase'];?>
 <link rel="stylesheet" href="style.css">
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

<?php include_once "footer.php"; ?>