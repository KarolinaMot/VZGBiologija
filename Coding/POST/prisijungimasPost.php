<?php
include_once "../PrisijungtiCode.php";

if(isset($_POST['prisijungti'])){
	$vardas=$_POST['userName'];
	$slaptazodis=$_POST['slaptazodis'];
	$result2 = TikrintiDuomenis($conn, $vardas, $slaptazodis);

	if($result2 == true){
		$_SESSION['prisijunges'] =true;
		$_SESSION['slapyvardis'] =$vardas;
		echo "<script type='text/javascript'>
				alert('Sekmingai prisijungėte :)');
				location='../../pradzia.php';
				</script>";
	}
	else if($result2==false) {
		$_SESSION['prisijunges'] =false;
		echo "<script type='text/javascript'>
				alert('Neteisingai ivesti duomenys :(');
				location='../../pradzia.php';
				</script>";
    }
}

?>