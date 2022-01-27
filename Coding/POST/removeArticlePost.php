<?php
	include_once "../PostasCode.php";

	if(isset($_POST['trinti'])){
		$pavadinimas = $_POST['pavadinimas'];
		DeletePost($conn, $pavadinimas);
	}
	else{
		echo "<script>alert('Kodo klaida')</script>";
	}
?>