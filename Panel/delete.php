<?php

session_start();
include "../database/pdo_connection.php";
$getId=$_GET['id'];
$delete=$connection->prepare("DELETE FROM posts WHERE id=?");
$delete->bindValue(1,$getId);
$delete->execute();

header('location:posts.php');

if(!isset($_SESSION['user'])){
  header("location:../login.php");
  
}

?>
