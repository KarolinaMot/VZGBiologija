<?php
	include_once "../PostasCode.php";

	if(isset($_POST['trinti'])){
		$pavadinimas = $_POST['trinti'];
		DeletePost($conn, $pavadinimas);
	}
	else{
		echo "<script>alert('Kodo klaida')</script>";
	}
?>