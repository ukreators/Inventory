
<?php


require('config.php');
 $quantity=$_REQUEST['quantity'];
 $idProduct=$_POST['idProduct'];
 




function updateTable($idProduct,$newQuantity){
    require('config.php');

    $query="UPDATE products SET stockProduct='$newQuantity' WHERE idProduct='$idProduct'";

    if(mysqli_query($connection,$query))
    {
        return 1;
    
    }
    else{
      echo '<br /><br /><div class="alert alert-danger">
  <strong>Got out of stock</strong></div>';
  return 0;
    }
}








 $query="SELECT stockProduct FROM products WHERE idProduct='$idProduct';";

$result=mysqli_query($connection,$query);

if(mysqli_affected_rows($connection)==1){
    
    while($row=mysqli_fetch_array($result)){
        $stock=$row["stockProduct"];
     if($quantity<=$stock){
        if(updateTable($idProduct,($stock-$quantity))){
            if(include('pay.php')){
                session_start();
                $userid=$_SESSION['id'];
                $query="INSERT INTO orders (userid,idproduct,quantity) VALUES('$userid','$idProduct','$quantity')";
                echo $query;
                 if(mysqli_query($connection,$query)){
                        $orderid=mysqli_insert_id($connection);
            header("location:orderPlaced.php?order=$orderid");}
            
                else {"Error updating orders table";}
            }
            else{
                echo "Payment failure";
                updateTable($idProduct,$stock);
                header('location:orderFailed.php');
            }
        }
    //    header('location:pay.php?p='.urlencode($idProduct).'&q='.urlencode($quantity));
     }
}

}else{
    echo '<div class="alert alert-danger">Error fetching from database</div>';
}



?>

