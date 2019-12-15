<?php
$id = $_GET['id'];
$color = $_GET['color'];
$descripcion = $_GET['descripcion'];

include_once 'Conexion.php';

$sql_query_editar = 'UPDATE youtubecolores SET color = ?, descripcion = ? WHERE id=?';
$sentencia_editar = $pdo->prepare($sql_query_editar);
$sentencia_editar->execute(array($color,$descripcion,$id));
   $pdo = null;
  header('location:index.php');
 ?>
