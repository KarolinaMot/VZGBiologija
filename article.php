<?php
	include_once "Coding/PostasCode.php";
	$pavadinimas = $_GET['article'];
?>
<link rel="stylesheet" href="style.css">

<html>
	<body>
		<div class="parallax">
			<?php include_once "header.php";?>
			<div class="parallax">
				<?php 	include_once "header.php";?>
					<div class="container">
						<?php
							if($_SESSION['prisijunges']){
								echo "<form class='col' action='Coding/POST/removeArticlePost.php' method='post'>
										<input type='hidden' value='".$pavadinimas."' name='pavadinimas'>
										<button class='btn btn-danger' type='submit' style='Width:100%;'>Trinti</button>
									 </form>";
							}
						?>
						<div class="row">
							<h2><?php echo $pavadinimas;?></h2><br>
							<div class="col-12">
								 <iframe id="pdf-js-viewer" src="PdfViewer/web/viewer.html?file=Uploads/<?php echo $pavadinimas ?>.pdf" title="webviewer" frameborder="0" width="100%" height="800px"></iframe>
							</div>
						</div>
					</div>
			</div>
		</div>
	</body>
</html>
<?php include_once "footer.php"; ?>
