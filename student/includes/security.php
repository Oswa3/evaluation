<?php
session_start();

include('conn.php');

if($conn){
  
}else{
  
}

if(!$_SESSION['username']){
  header('Location: ../login.php');
}
?>