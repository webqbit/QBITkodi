<?php

session_start();

include_once 'conexion.php';

$name_user = $_POST['nameUser'];
$password = $_POST['pass'];

$sql = 'SELECT * FROM usuarios WHERE user = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($name_user));
$resultado = $sentencia->fetch();
if (!$resultado) {
  echo "user no existe";
  die();
}


if (password_verify($password, $resultado['password'])) {
    echo '¡La contraseña es válida!';
    $_SESSION['admin']= $name_user;
    header('location:restringido.php');


} else {
    echo 'La contraseña no es válida.';
    die();
}

 ?>
