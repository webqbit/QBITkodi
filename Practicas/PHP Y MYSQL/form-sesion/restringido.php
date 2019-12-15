<?php

session_start();

if(isset($_SESSION['admin'])){
  echo "biemvenido".$_SESSION['admin'];
  echo('<a href="cerrar.php">cerrar session</a>');
}
else {
  header('location:registro.php');
}

 ?>
