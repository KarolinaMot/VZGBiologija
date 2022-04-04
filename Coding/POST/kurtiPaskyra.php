<?php
include_once "../PrisijungtiCode.php";

if(isset($_POST['register'])){
	$vardas=$_POST['slapyvardis'];
	$slaptazodis1 = $_POST['slaptazodis'];
	$slaptazodis2 = $_POST['kartotiSlaptazodi'];
	if(isset($_POST['galiKurti'])){
		$galiKurti = true;
	}
	else{
		$galiKurti = false;
	}

	if($vardas != null){
		if($slaptazodis1 != null){
			if($slaptazodis2!=null){
				if($slaptazodis1==$slaptazodis2){

					$naujasSlaptazodis = password_hash($slaptazodis1, PASSWORD_DEFAULT);
					Registruoti($conn, $vardas, $naujasSlaptazodis, $galiKurti);
					echo '<script>alert("Paskyra sukurta."); location="../../index.php?puslapis=admin" </script>';

				}
				else{
					echo "<script type='text/javascript'>
							alert('Slaptažodžiai nesutampa.');
							location='../../index.php?puslapis=admin';
							</script>";
				}
			}
			else{
				echo "<script>alert('Pakartokite slaptažodį.'); location='../../index.php?puslapis=admin'<script>";
			}
		}
		else{
			echo "<script>alert('Įrašykite slaptažodį.'); location='../../index.php?puslapis=admin'<script>";
		}
	}
	else{
		echo "<script>alert('Įrašykite slapyvardį.'); location='../../index.php?puslapis=admin'<script>";
	}
	

}

?>