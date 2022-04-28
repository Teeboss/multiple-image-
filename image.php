<?php

include ("DB.php");


if (isset($_POST['upload'])) {
  $id = time();
  $texts = $_POST['postbody'];
  $image = $_FILES['image']['name'];
   $count = count($image);
   for ($i=0; $i < $count; $i++) { 
       $rename[$i] = "Image_".str_shuffle(time()."eoiildklkiwoerfiwpdxckc").".jpg";
    }
  foreach ($image as  $key => $value) {       
     $images = $image[$key];   
     move_uploaded_file($_FILES['files']['tmp_name'][$key] , $fileLocation.$rename[$key]);
     $imploded = implode("," , $rename);
     global $rename;
   }
  DB::query('INSERT INTO image VALUES ( :id , :images , :texts ,  NOW() )' , array( ':id'=>$id,':images'=> $imploded, ':texts'=>$texts));
}


?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="image.php" enctype="multipart/form-data" method="post">
	
	<input type="file" name="image[]" multiple>
	<textarea name="postbody">
		
	</textarea>
	<input type="submit" name="upload" value="upload">
</form>
</body>
</html>
