
<?php include('sessionCheck.php') ?>

<?php

$GLOBALS['id']=$_GET['id'];
?>
<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="description" content="Products">
    <meta name="author" content="Ukreators">
    <link rel="icon" href="rsc/logo_icon.ico">

    <title>Products</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

 
    <link href="css/products.css" rel="stylesheet">



  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">XXX</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="home.php">Home</a></li>
            <li ><a href="products.php">Products</a></li>
            <li><a href="account.php">My Account</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
           <span class="lead" style="float: right;margin-top: 15px;margin-right: 5px;font-size: medium;color: #FFFFFF;">Welcome <?php echo $GLOBALS['name'];?></span>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


  <div class="container">


  <?php
        
    require_once('config.php');
    
    $idProduct=$_GET['id'];
    
$query='SELECT nameProduct,priceProduct,imageProduct,descriptionProduct,stockProduct FROM products WHERE idProduct="'.$idProduct.'";';

$result=mysqli_query($connection,$query);

if(mysqli_affected_rows($connection)==1){
    while($row=mysqli_fetch_array($result)){
        $nameProduct=$row["nameProduct"];
        $priceProduct=$row["priceProduct"];
        $imageProduct=$row["imageProduct"];
        $stockProduct=$row["stockProduct"];
        $descriptionProduct=$row["descriptionProduct"];


echo'
<div class="row" style="margin-top: 5%;">
        <div class="col-sm-4">
         <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="rsc/products/'.$idProduct.'.jpg" data-holder-rendered="true" style="width: 350px; height: 350px;">  

</div>

  <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">'.$nameProduct.'</h3>
            </div>
            <div class="panel-body">
            <form method="POST" action="review.php">
           <input type="hidden" name="idProduct" value="'.$idProduct.'"/input>
              Price: Rs '.$priceProduct.'<br /><br />
              
              Quantity: 
            <select name="quantity">';
            
            for($i=1;($i<$stockProduct)&&($i<=10);$i++){
            echo '<option value="'.$i.'">'.$i.'</option>';
            }
            echo '</select>
            </div>
          </div></div>
  <div class="col-sm-4" style="padding: 5%;">
 
  <input type="submit" name="buy" class="btn btn-lg btn-info" value="BUY NOW"/>
  </form>
</div>

</div>


 <div class="jumbotron" >
        <h2>Description</h2>
        <p>'.$descriptionProduct.'</p>
      </div>';
      }
      }
      else{
  echo '<center><span style="color:red;" ><br />Error fetching data from DB.</span></center>';
}
  
      
?>

<!--footer here -->
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Starter Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  

</body></html>




