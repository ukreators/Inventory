

<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <meta name="description" content="Admin Login">
    <meta name="author" content="Ukreators">
    <link rel="icon" href="rsc/logo_icon.ico">

    <title>Admin Login</title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet">

   
  </head>

  <body>
  <div class="container">
  <div class="page-header">
        <h2>Login for Admin</h2>
      </div>
    

    

   <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Log In</h2>

        <input type="text" name="username" class="form-control" placeholder="Username" required="" autofocus="">
      
        <input type="password" name="password" class="form-control" placeholder="Password" required="">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="Submit">Sign in</button>
      </form>


</div>

<?php
if(isset($_POST['submit'])){
    if($_POST['username']=='admin' && $_POST['password']=='admin'){
        session_start();
        $_SESSION['adminPermit']=1;
        header('location:addProduct.php');
    }
    else{
          echo '<br /><br /><div class="alert alert-danger">
  <strong>Invalid!</strong></div>';
    }
}



?>

</body></html>