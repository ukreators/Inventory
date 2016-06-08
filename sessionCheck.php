<?php
session_start();
if(isset($_SESSION['loginTrue']) && $_SESSION['loginTrue']==1)
{
    $GLOBALS['name']=$_SESSION['name'];
    $GLOBALS['email']=$_SESSION['email'];
}
else{
    session_unset();
    session_destroy();
    header('location:login.php');
}
?>
