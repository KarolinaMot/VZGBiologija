<?php
	include_once "../PostasCode.php";

	if(isset($_GET['article'])){
		$pavadinimas = $_GET['article'];
		DeletePost($conn, $pavadinimas);
	}
	else{
		echo "<script>alert('Kodo klaida')</script>";
	}
?>