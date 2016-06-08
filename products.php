<!DOCTYPE html>
<?php include('sessionCheck.php') ?>
<?php $GLOBALS['sort']="idProduct"; ?>
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
            <li class="active"><a href="#">Products</a></li>
            <li><a href="account.php">My Account</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
           <span class="lead" style="float: right;margin-top: 15px;margin-right: 5px;font-size: medium;color: #FFFFFF;">Welcome <?php echo $GLOBALS['name'];?></span>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>Inventory Products</h1></div>
        
        <form action="#" target="_self" method="GET"><select name="sort"> <option value="idProduct"> New</option><option value="priceProduct">Price</option></select><input name="go"type="submit" value="Go"/></form>
        <?php
            if(isset($_REQUEST['go'])){
                $GLOBALS['sort']=$_GET['sort'];
            }
        ?>
        
    <div class="row">
    
    
    <?php
        
    require_once('config.php');
    $sort=$GLOBALS['sort'];
$query="SELECT idProduct,nameProduct,priceProduct,imageProduct FROM products ORDER BY $sort DESC;";

$result=mysqli_query($connection,$query);
$totalProducts=0;
if($totalProducts=mysqli_affected_rows($connection)!=0){
    while($row=mysqli_fetch_array($result)){
        $nameProduct=$row["nameProduct"];
        $priceProduct=$row["priceProduct"];
        $imageProduct=$row["imageProduct"];
        $idProduct=$row["idProduct"];
      

    echo' <a href="buyProduct.php?id='.$idProduct.'"><div class="col-sm-3">
      <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">'.$nameProduct.'</h3>
            </div>
            <div class="panel-body">
                        <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="rsc/products/'.$idProduct.'.jpg" data-holder-rendered="true" style="width: 100px; height: 100px;">  
                          <span style="margin-left:30px;">  Rs '.$priceProduct.' </span>  
            </div> 
          </div>
          </div><!-- col-sm-4 --></a>';

      
          }
}
else{
  echo '<center><span style="color:red;" ><br />Error fetching data from DB.</span></center>';
}
  
         ?>
         
         
         
         
         <!-- This one is a sample item to check. Delete when database is full of products-->
         <div class="col-sm-3">
      <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Product Name can be large</h3>
            </div>
            <div class="panel-body">
                        <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="rsc/products/product.jpg" data-holder-rendered="true" style="width: 100px; height: 100px;">  
                          <span style="margin-left:30px;">  Rs 200 </span>  
            </div> 
          </div>
          </div><!-- col-sm-4 --><!--Sample ends-->
          
          
          
          
          
         
          </div><!-- row ends-->
      
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