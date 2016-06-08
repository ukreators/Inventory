<?php

$host='localhost';
$user='mod';
$password='pass123';
$database='inventory';

$connection = mysqli_connect($host, $user, $password,$database) or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");

?>
