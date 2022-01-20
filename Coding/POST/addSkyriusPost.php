<?php
include_once "../SkyriusCode.php";

if(isset($_POST['skyrius'])){
	
	$name = $_POST['addSkyriausPavad'];
	$result = CheckIfExists($conn, $name);
	if(!$result){
		InsertToSkyrius($name, $conn);
	}
	else{
		unset($_POST['skyrius']);
		unset($_POST['addSkyriausPavad']);
		$_GET['link'] = "Admin";
		echo "<script type='text/javascript'>
				alert('Skyrelis tokiu pavadinimu jau egzistuoja. Pasirinkite kitą.');
				location='../../admin.php';
				</script>";
	}


	unset($_POST['skyrius']);
	unset($_POST['addSkyriausPavad']);
	$_GET['link'] = "Admin";
	echo "<script type='text/javascript'>
				alert('Skyrelis sėkmingai sukurtas.');
				location='../../admin.php';
				</script>";

}
?>