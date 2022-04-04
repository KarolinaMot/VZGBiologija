<?php
	include_once "Coding/PostasCode.php";
	$pavadinimas = $_GET['article'];
?>

<div class="wrap" data-aos="fade-up" data-aos-duration="500" data-aos-offset="10">
	<h2 style="text-align: center; margin-top: -2%"><?php echo $pavadinimas;?></h2><br><br>
	<iframe id="pdf-js-viewer" src="PdfViewer/web/viewer.html?file=Uploads/<?php echo $pavadinimas;?>.pdf" title="webviewer" frameborder="0" width="100%" height="800px"></iframe>
</div>	

