<?php
include_once "../PrisijungtiCode.php";

if(isset($_POST['keistiSlaptazodi'])){
	$vardas=$_SESSION['slapyvardis'];
	$slaptazodis1 = $_POST['slaptazodis'];
	$slaptazodis2 = $_POST['kartotiSlaptazodi'];

	if($slaptazodis1==$slaptazodis2){
		KeistiSlaptazodi($conn, $slaptazodis1, $vardas);
		echo "<script type='text/javascript'>
				alert('Slaptazodis pakeistas :)');
				location='../../index.php?puslapis=admin';
				</script>";
	}
	else{
		echo "<script type='text/javascript'>
				alert('Slaptažodžiai nesutampa :(');
				location='../../admin.php';
				</script>";
	}

}

?>