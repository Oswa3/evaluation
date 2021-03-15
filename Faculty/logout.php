<?php
if(isset($_POST['logout'])){
  session_destroy();
  unset($_POST['username']);
  header('Location: ../login.php');
}
?>