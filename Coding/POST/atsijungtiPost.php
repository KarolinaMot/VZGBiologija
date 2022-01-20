<?php
include_once "../PrisijungtiCode.php";

if(isset($_POST['atsijungtiBtn'])){
	$_SESSION['prisijunges'] =false;
		echo "<script type='text/javascript'>
				alert('Sekmingai atsijungete :)');
				location='../../pradzia.php';
				</script>";
}
?>