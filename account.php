<!DOCTYPE html>
<?php include('sessionCheck.php') ?>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="description" content="Products">
    <meta name="author" content="Ukreators">
    <link rel="icon" href="rsc/logo_icon.ico">

    <title>Account</title>

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
            <li class="active"><a  href="account.php">My Account</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
           <span class="lead" style="float: right;margin-top: 15px;margin-right: 5px;font-size: medium;color: #FFFFFF;">Welcome <?php echo $GLOBALS['name'];?></span>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      
        
 <div class="row">
        <div class="col-sm-6">
              <div class="starter-template">
        <h1>My Account</h1></div>
        <p style="line-height: 32px;">
        <?php require_once('config.php');
        $email=$GLOBALS['email'];
    
$query="SELECT * FROM users WHERE email='$email';";

$result=mysqli_query($connection,$query);

if(mysqli_affected_rows($connection)==1){
    
    while($row=mysqli_fetch_array($result)){
        $name=$row["name"];
       $email=$row["email"];
       $mobile=$row["mobile"];
       $add1=$row["add1"];
       $add2=$row["add2"];
       $city=$row["city"];
       $state=$row["state"];
       $pin=$row["pin"];
       
       echo "
            <br><b>Name : </b> $name 
            <br><b>Email Address : </b> $email   
            <br><b>Mobile No. : </b> $mobile   
            <br><b>Address: : </b> $add1   
            <br><b></b> $add2   
            <br><b>City : </b> $city   
            <br><b>State : </b> $state   
            <br><b>Pin : </b> $pin   
              
       ";
       
            
    }
}
        ?>
        <br /><br />
        <button class="btn btn-sm btn-default" name="update" onclick="window.location.href='updateInfo.php'" type="button">Update Details</button>  
        </p>
        </div><!-- /.col-sm-4 -->
       
        <div class="col-sm-6">
         <div class="starter-template">
        <h1></h1></div><br /><br />
        
          <button class="btn btn-lg btn-primary" name="orders" type="button"  style="clear: both;">Orders</button>
        
        </div><!-- /.col-sm-4 -->
    
    </div>
   
      
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