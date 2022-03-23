<?php
	include_once "Coding/PostasCode.php";
	include_once "Coding/SkyriusCode.php";
	$result2 = SearchByKlase($conn, $_GET['klase']);
	if($result2==null){
		echo "<script type='text/javascript'>
			alert('Šita klasė dar neturi jokių konspektų.');
			location='index.php';
			</script>";
	}
	$klase = $_GET['klase'];
?>

<div class="wrap">
	<?php
		$skyriai = SkyriuArray($conn);
		for($i=0; $i<count($skyriai); $i++){
			$result = 0;
			$sql ="SELECT * FROM postas WHERE Skyrius='".$skyriai[$i]."'";
			$result2 = $conn->query($sql);

			echo "<h2>".ucfirst($skyriai[$i])."</h2>";
			echo "<div class='skyriusBoard'>";
				FillKonspektusBySkyrius($conn, $skyriai[$i], $klase);					 
			echo "</div>";
			echo "<br><br>";
						
		}
	?>
</div>
			