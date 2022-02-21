<?php
	include_once "Coding/PostasCode.php";
	$pavadinimas = $_GET['article'];
?>
<link rel="stylesheet" href="style.css">

<html>
	<body>
		<div class="parallax">
			<?php include_once "header.php";?>
				<div class="container-fluid blackBckgrnd" height="5000px" width="100%">
					<div class="container" >
						<div class="row">
							<div class="col-12">	
									<h2 style="text-align: center; margin-top: -2%"><?php echo $pavadinimas;?></h2><br><br>
									<iframe id="pdf-js-viewer" src="PdfViewer/web/viewer.html?file=Uploads/<?php echo $pavadinimas;?>.pdf" title="webviewer" frameborder="0" width="100%" height="800px"></iframe>
							</div>
						</div>
					</div>
				</div>
		</div>
	</body>
</html>
