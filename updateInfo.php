<!DOCTYPE html>
<?php include('sessionCheck.php') ?>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="description" content="Products">
    <meta name="author" content="Ukreators">
    <link rel="icon" href="rsc/logo_icon.ico">

    <title>Update Information</title>

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
            <li ><a href="products.php">My Account</a></li>
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
        <h1>Update Info</h1></div>
       <form  method="POST" action="#" target="_self" >
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
       $GLOBALS['id']=$row['userid'];
       
       echo '
            <br><b>Name : </b> <input type="text" value="'.$name.'" name="name" style="border-width: thin;float:right;clear:right;" />
            <br /><br><b>Email Address : </b> <input type="text" value="'.$email.'" name="email" style="border-width: thin;float:right;clear:right;" /> 
            <br /><br><b>Mobile No. : </b><input type="text" value="'.$mobile.'" name="mobile" style="border-width: thin;float:right;clear:right;"/>  
            <br><b>Address: : </b> <input type="text" value="'.$add1.'" name="add1" style="border-width: thin;float:right;clear:right;"/>  
            <br /><br><b>    </b> <input type="text" value="'.$add2.'" name="add2" style="border-width: thin;float:right;clear:right;" />  
            <br><br /><b>City : </b> <input type="text" value="'.$city.'" name="city"  style="border-width: thin;float:right;;"/>
            <br><br /><b>State : </b> <input type="text" value="'.$state.'" name="state"  style="border-width: thin;float:right;clear:right;"/> 
            <br /><br><b>Pin : </b> <input type="text" value="'.$pin.'" name="pin" style="border-width: thin;float:right;clear:right;"/>  
              
       ';
       
            
    }
}
        ?>
        
        <br /><br />
        <input class="btn btn-sm btn-default" name="update" onclick="window.location.href='updateInfo.php'" type="submit" value="Update Now"/>  
        </form>
       <?php  if(isset($_REQUEST['update'])){
        require_once('config.php');
        $email=$GLOBALS['email'];
        $email=$_REQUEST['email'];
        $mobile=$_REQUEST['mobile'];
        $add1=$_REQUEST['add1'];
        $add2=$_REQUEST['add2'];
        $city=$_REQUEST['city'];
        $state=$_REQUEST['state'];
        $pin=$_REQUEST['pin'];
        if($pin==''){$pin='000000';}
        $id=$GLOBALS['id'] ;
        $query="UPDATE users SET name='$name',email='$email',mobile='$mobile',add1='$add1',add2='$add2',city='$city',state='$state',pin=$pin  WHERE userid=$id;";
        //echo $query;
        if(mysqli_query($connection,$query))
    {
    header('location:account.php');
    }
    else{
      echo '<br /><br /><div class="alert alert-danger">
  <strong>These values are not allowed!</strong></div>';
    }
       
       }?>
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