<?php
	include_once "Coding/SkyriusCode.php";
	include_once "Coding/PostasCode.php";
	$result2 = SearchBySkyrius($conn, $_GET['skyrius']);
		if($result2==null){
			echo "<script type='text/javascript'>
				alert('Šitas skyrius dar neturi jokių konspektų.');
				location='index.php';
				</script>";
		}
	$skyrius = $_GET['skyrius'];?>

<div class="wrap">
	<?php
			$klases = KlasiuArray($conn);
			for($i=0; $i<count($klases); $i++){
				$result = 0;
				$sql ="SELECT * FROM postas WHERE klase='".$klases[$i]."'";
				$result2 = $conn->query($sql);

				echo "<h2>".ucfirst($klases[$i])."</h2>";
				echo "<div class='skyriusBoard'>";
					FillKonspektusByKlase($conn, $klases[$i], $skyrius);					 
				echo "</div>";
				echo "<br><br>";
					
			}
	?>
</div>