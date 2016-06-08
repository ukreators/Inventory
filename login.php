<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <meta name="description" content="User Login Registeration">
    <meta name="author" content="Ukreators">
    <link rel="icon" href="rsc/logo_icon.ico">

    <title>Signin or Register</title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet">

   
  </head>

  <body>
  <div class="container">
  <div class="page-header">
        <h2>Login or Register</h2>
      </div>
      <div class="row">
        <div class="col-sm-5">

    

   <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Log In</h2>

        <input type="email" name="loginEmail" class="form-control" placeholder="Email address" required="" autofocus="">
      
        <input type="password" name="loginPassword" class="form-control" placeholder="Password" required="">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="loginSubmit" type="Submit">Sign in</button>
      </form>

  </div>
     <div class="col-sm-2">  </div>
        <div class="col-sm-5">
          <div class="list-group">

      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Register here</h2>
        
        <input type="text" name="registerName" style="margin-bottom: 10px;" class="form-control" placeholder="Full Name" required="" autofocus="">
        <input type="number" name="registerMobile" style="margin-bottom: 10px;" class="form-control" placeholder="Mobile No." required="" autofocus="">
        <input type="email" name="registerEmail" style="margin-bottom: 10px;" class="form-control" placeholder="Email address" required="" autofocus="">
      
        <input type="password" style="margin-bottom: 10px;" name="registerPassword" class="form-control" placeholder="Password" required="">
        <input type="password" style="margin-bottom: 10px;" name="registerPassword2" class="form-control" placeholder="Re-Enter Password" required="">
        <div class="checkbox">
          
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="Submit" name="registerSubmit">Register</button>
      </form>
       </div>
        </div>
     </div>
    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <script src="./Signin Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>-->
  

</body></html>

<?php
$GLOBALS['name']="";
//function createKey(){
//    $key=time();
//    $key=$key.$name;
//    $key=md5($key);
//    return $key;
//}
//
//function startSession(){
//    $cookie_name = "user";
//    $key=createKey();
//$cookie_value = $key;
//setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/");
//session_start();
//$_SESSION['user']=$name;
//$_SESSION['key']= $key;
//}
//
if(isset($_POST['registerSubmit']))
{
   
    function password_check()
    {
        if(($password=$_POST['registerPassword'])==($_POST['registerPassword2'])){
            return 1;
        }
        else{ 
            echo '<span style="color:red;" ><br />Password mis-match</span>';
            return 0;}
    }
    
     //Checking conditions
   if( password_check())
   {
    
    //Databsae connecting
    require_once('config.php');
    
    
  
   $email=$_POST["registerEmail"];
   $mobile=$_POST["registerMobile"];
   $password=$_POST["registerPassword"];
   $name=$_POST["registerName"];
   $password=md5($password);
   
    
   $query="INSERT INTO users (name,email,mobile,password) VALUES ('$name','$email','$mobile','$password' )";
    
    if(mysqli_query($connection,$query))
    {
    echo '<center><script> alert("Registration Successfull \nRedirecting to Homepage...")</script></center>';
    echo '<script>window.location.assign("home.php")</script>';
    }
    else{
      echo "Error in saving details to database".mysqli_error($connection);
    }
    
   }
    
    
   }
   
   
  if(isset($_POST['loginSubmit']))
{
   $email=$_POST["loginEmail"];
$password=md5($_POST["loginPassword"]);
$passwordDb="";



function password_check($passwordDb)
    {    $password=md5($_POST["loginPassword"]);
        if(($password==$passwordDb))
        {   
            SESSION_start();
            $_SESSION['id']=$GLOBALS['userid'];
            $_SESSION['email']=$_POST["loginEmail"];
            $_SESSION['name']=$GLOBALS['name'];
            $_SESSION['loginTrue']=1;
            
            header("location:home.php");
            return 1;
        }
        else{ 
            echo '<center><span style="color:red;" ><br />Check Username and Password</span></center>';
            return 0;}
    }
    

require_once('config.php');
    
$query="SELECT password,name,userid FROM users WHERE email='$email';";

$result=mysqli_query($connection,$query);

if(mysqli_affected_rows($connection)==1){
    
    while($row=mysqli_fetch_array($result)){
        $passwordDb=$row["password"];
        $GLOBALS['name']=$row["name"];
        $GLOBALS['userid']=$row["userid"];
      password_check($passwordDb);  
    }
}
else{
    session_start();
            $_SESSION['loginTrue']=0;
            session_unset();
            session_destroy();
  echo '<center><span style="color:red;" ><br />User Not Registered.</span></center>';
}


   
   } 
   ?> 
