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
	$skyrius = $_GET['skyrius'];
	?>

<div class="wrap">
	<?php
			$klases = KlasiuArray($conn);
			for($i=0; $i<count($klases); $i++){
				$result = 0;
				$sql ="SELECT * FROM postas WHERE klase='".$klases[$i]."'";
				$result2 = $conn->query($sql);
				if($klases[$i]=="treciokams")
				{
					$klase="trečiokams";
				}
				else{
					$klase=$klases[$i];
				}
				echo "<div data-aos='fade-up'  data-aos-easing='ease-in-out' data-aos-duration='500' data-aos-offset='10'>";
				echo "<h2 >".ucfirst($klase)."</h2>";
				echo "<div class='skyriusBoard'>";
					FillKonspektusByKlase($conn, $klases[$i], $skyrius);					 
				echo "</div>";
				echo "</div>";
				echo "<br><br>";
					
			}
	?>
</div>