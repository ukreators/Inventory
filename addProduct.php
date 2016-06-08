<?php

session_start();
if(isset($_SESSION['adminPermit']) && $_SESSION['adminPermit']==1){
}
else{header('location:adminLogin.php');}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product Adder</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
</head>
<body style="margin-top: 20px;">

<div class="container" >
<div class="row">
<div class="col-sm-8">
 <button type="button" class="btn btn-lg btn-warning" onclick="window.location.href='ADMINlogout.php'">Log out</button>
  <h1>Add Product</h1>
<form method="POST" target="_self" action="#" enctype="multipart/form-data">
    <input type="text" name="nameProduct" style="margin-bottom: 10px;" class="form-control" placeholder="Product Name" required="" >
    <input type="text" name="priceProduct" style="margin-bottom: 10px;" class="form-control" placeholder="Product Price" required="" >
    <input type="text" name="stockProduct" style="margin-bottom: 10px;" class="form-control" placeholder="Product Stock" required="" >
    <textarea name="descriptionProduct" style="margin-bottom: 10px;" class="form-control" placeholder="Product Description" required="" rows="8"></textarea>
    <br /><br />
    <div class="row">
    <div class="col-sm-8">
    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control"  /></div>
     <div class="col-sm-4"><input type="submit" value="Upload Image" name="imageUpload" class="form-control" placeholder="Product Description" disabled=""/></div>
    </div>
      <br />  <input style="background-color: aliceblue;" type="submit" value="Add Now" name="submit" class="form-control" >
</form>



</div>
</div>
</div>
</body>
</html>






<?php

if(isset($_REQUEST['submit'])){
  $GLOBALS["updated"]=0;  
require_once('config.php'); 

 $nameProduct=$_POST["nameProduct"];  
  $priceProduct=$_POST["priceProduct"]; 
  $stockProduct=$_POST["stockProduct"]; 
  $descriptionProduct=$_POST["descriptionProduct"]; 
  
  $query="INSERT INTO products (nameProduct,priceProduct,stockProduct,descriptionProduct) VALUES ('$nameProduct','$priceProduct','$stockProduct','$descriptionProduct')";
  
  
  if(mysqli_query($connection,$query)){
    $GLOBALS["idProduct"]=mysqli_insert_id($connection);
    echo "<br />Product ".$GLOBALS["idProduct"]. " is added.<br />";
        $GLOBALS["updated"]=1; 
     }
     else{
        echo '<div class="alert alert-danger">Error :Product not added</div>';
        $GLOBALS["updated"]=0; 
     };
    
 if($GLOBALS["updated"]==1){  
//file upload 
$target_dir = "rsc/products/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$file_new_name=$target_dir.$GLOBALS["idProduct"];
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file="$file_new_name.$imageFileType";
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<div class='alert alert-danger'>File is not an image.</div>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<div class='alert alert-danger'>Sorry, file already exists.</div>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<div class='alert alert-danger'>Sorry, your file is too large.</div>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<div class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<div class='alert alert-danger'>Sorry, your file was not uploaded.</div>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
    }
}
}else{echo"<div class='alert alert-danger'>File was not uploaded since entry not updated</div>";}
}
?> 
