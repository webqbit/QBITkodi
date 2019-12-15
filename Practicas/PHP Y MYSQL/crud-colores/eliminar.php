<?php


include_once 'Conexion.php';

$id = $_GET['id'];

$sql_eliminar = 'DELETE FROM youtubecolores WHERE id=?';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar->execute(array($id));
$pdo = null;
  header('location:index.php');
