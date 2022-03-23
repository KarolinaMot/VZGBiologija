<?php
include_once "../PostasCode.php";

if (isset($_POST['postas']))
{
    $pavadinimas = $_POST['postPavadinimas'];
    $skyrius = $_POST['skyrius'];
    $klase = $_POST['klase'];
    $skyriusID = SelectSkyriusID($conn, $skyrius);
    $klaseID = SelectKlaseID($conn, $klase);
    $ikelta = false;
    $newFileName =" ";

      if (isset($_FILES['uploadedFile']))
      {
        // get details of the uploaded file
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // sanitize file-name
        $newFileName =  $pavadinimas. '.' . $fileExtension;

        if ($fileExtension == "pdf")
        {
          // directory in which the uploaded file will be moved
          $uploadFileDir = '../../PdfViewer/web/Uploads/';
          $dest_path = $uploadFileDir . $newFileName;

          if(move_uploaded_file($fileTmpPath, $dest_path)) 
          {
            $message ='File is successfully uploaded.';
            $ikelta = true;
          }
          else 
          {
            echo "<script>alert('There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.');</script>";
            $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
          }
        }
        else
        {
          $message = "Ikeltas failas nera .pdf";
          echo "<script>alert('Ikeltas failas nera .pdf');</script>";
        }
      }
      else
      {
        $message = 'There is some error in the file upload. Please check the following error.<br>';
        echo "<script>alert('ERROR');</script>";
      }

      $array = SearchByPavadinimas($conn, $pavadinimas);
      if(empty($array)==false)
      {
          $ikelta = false;
          echo "<script>alert('Postas tokiu pavadinimu jau egzistuoja');</script>";
      }

      if($ikelta == false)
      {
          echo "<script type='text/javascript'>
				alert('Postas nesukurtas :(');
				location='../../index.php';
				</script>";
      }
      else{
         InsertToPostas($conn, $pavadinimas, $klaseID, $klase, $newFileName, $skyriusID, $skyrius);
      }

      unset($_POST['postas']);
      unset($_POST['postPavadinimas']);
      unset($_POST['skyrius']);
      unset($_POST['klase']);

      $_GET['link'] = "Admin";
      	echo "<script type='text/javascript'>
				location='../../index.php';
				</script>";
}

?>