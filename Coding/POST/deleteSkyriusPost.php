<?php
include_once "../SkyriusCode.php";


if(isset($_POST['deleteSkyrius'])){
	$pavadinimas=$_POST['removeSkyriusName'];
	DeleteFromSkyrius($conn, $pavadinimas);
	unset($_POST['deleteSkyrius']);
	unset($_POST['removeSkyriusName']);
	echo "<script type='text/javascript'>
				location='../../pradzia.php';
				</script>";
}

?>