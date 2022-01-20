<?php include_once "Coding/SkyriusCode.php";
	  include_once "header.php";
?>

 <link rel="stylesheet" href="style.css">
	<div class="container">
		<h3>KONSPEKTAI PAGAL KLASES</h3>
		<div class="darkGrayBckgrnd roundedCorners" style="padding-left:3%; padding-right:3%;">
			<div class="row">
				<div class="col klase margintop roundedCorners">
					<h3><a style="color: white;" href="klases.php?klase=Pirmokams">PIRMOKAMS</a></h3>
				</div>
				<div class="col klase marginleft margintop roundedCorners">
					<h3><a style="color: white;" href="klases.php?klase=Antrokams">ANTROKAMS</a></h3>
				</div>
				<div class="col klase marginleft margintop roundedCorners">
					<h3><a style="color: white;" href="klases.php?klase=Trečiokams">TREČIOKAMS</a></h3>
				</div>
				<div class="col klase marginleft margintop roundedCorners">
					<h3><a style="color: white;" href="klases.php?klase=Ketvirtokams">KETVIRTOKAMS</a></h3>
				</div>
			</div>
		</div>
		<br>

		<h3>KONSPEKTAI PAGAL SKYRIUS</h3>
		<div class="darkGrayBckgrnd roundedCorners" style="padding-left:3%; padding-right:3%;">
			<div clas="container-fluid">
				<?php
					FillBody($conn);
				?>
			</div>
		</div>
	</div>

<?php include_once "footer.php";?>