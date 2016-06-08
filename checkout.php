
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
    <style>
    .vertical-center {
  min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
  min-height: 100vh; /* These two lines are counted as one :-)       */

  display: flex;
  align-items: center;
}
    </style>


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
            <li class="active"><a href="products.php">Products</a></li>
            <li><a href="account.php">My Account</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


  <div class="container" >
  
   

  
   <div class="jumbotron"  >
        <?php
        require_once('config.php');
        
          $quantity=$_POST['quantity'];
          $idProduct=$_POST['idProduct'];
    
    
$query='SELECT nameProduct,priceProduct,imageProduct FROM products WHERE idProduct="'.$idProduct.'";';

$result=mysqli_query($connection,$query);

if(mysqli_affected_rows($connection)==1){
    while($row=mysqli_fetch_array($result)){
        $nameProduct=$row["nameProduct"];
        $priceProduct=$row["priceProduct"];
        $imageProduct=$row["imageProduct"];
        
        echo '<div class="row" style="margin-top: 5%;">
        <div class="col-md-2">
         <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="rsc/products/'.$idProduct.'.jpg" data-holder-rendered="true" style="width: 100px; height: 100px;"> </div>
         
         <div class="col-md-10">

<table class="table">
            <thead>
              <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th><b>Total</b></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>'.$nameProduct.'</td>
                <td>'.$priceProduct.'</td>
                <td>'.$quantity.'</td>
                <td>'.$priceProduct*$quantity.'</td>
              </tr>
              
            </tbody>
          </table>
</div>
         </div>';

                }
      }
      else{
  echo '<center><span style="color:red;" ><br />Error fetching data from DB.</span></center>';
}
  
        
        
        ?>
      </div>
  
  

  <form method="POST" target="checkout.php"><input name="idProduct" value=""/><input type="quantity" value=""/>
  <button class="btn btn-lg btn-success" style="float: right;" type="submit">Pay Now</button>
</form>
  
  
  
  
  
  
  
  
  
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



