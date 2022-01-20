<?php
	include_once "../PostasCode.php";

	if(isset($_POST['trinti'])){
		$pavadinimas = $_POST['pavadinimas'];
		DeletePost($conn, $pavadinimas);
		echo "<script type='text/javascript'>
				alert('Postas sėkmingai ištrintas.');
				location='../../admin.php';
				</script>";
	}
?>