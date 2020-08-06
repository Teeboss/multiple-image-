<?php

include ("DB.php");


if (isset($_POST['upload'])) {
  $id = time();
  $texts = $_POST['postbody'];
  $image = $_FILES['image']['name'];
   $images = implode(",", $_FILES['image']['name']);
  DB::query('INSERT INTO image VALUES ( :id , :images , :texts ,  NOW() )' , array( ':id'=>$id,':images'=>$images, ':texts'=>$texts));
 foreach ($image as $key => $value) {
  $location = "image/".basename($image[$key]);
  move_uploaded_file($_FILES['image']['tmp_name'][$key] , $location); 
 }
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