<?php

    include_once 'conexion.php';



// info de hash de las contraseñas
// Guardar contraseñas en MySql con PHP es bastante fácil aplicando un Hash.
//
// Información oficial de PHP aquí:
// https://www.php.net/manual/es/faq.passwords.php
// https://www.php.net/manual/es/function.password-verify.php

$user_new = $_POST['nameUser'];
$password1 = $_POST['pass1'];
$password2 = $_POST['pass2'];

$sql = 'SELECT * FROM usuarios WHERE user = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($user_new));
$resultado = $sentencia->fetch();
if ($resultado) {
  echo "ya existe el user";
  die();
}

$password1 = password_hash($password1,PASSWORD_DEFAULT);
// $password2 = password_hash($password2,PASSWORD_DEFAULT);

if (password_verify($password2, $password1)) {
    echo '¡La contraseña es válida!';


      $sql_query_insertar = 'INSERT INTO usuarios (user,password) VALUES (?,?)';
      $sentencia_agregar = $pdo->prepare($sql_query_insertar);
      if ($sentencia_agregar->execute(array($user_new,$password1))){
        echo "agregado";
      }
      else {
        echo "error";
      }

      // header('location:index.php');
      $sentencia_agregar = null;
      $pdo = null;

} else {
    echo 'La contraseña no es válida.';
}

echo ($user_new);
echo "<BR>";
echo ($password1);
echo "<BR>";
echo ($password2);
