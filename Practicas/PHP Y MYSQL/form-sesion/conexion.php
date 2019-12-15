<?php

/*
Conexion PDO
 pq es un standar para conectarse a distintos tipos de DB
no solo mysql https://www.php.net/manual/es/pdo.connections.php
*/

// Conexion capturando errores
$link = 'mysql:host=localhost;dbname=colores';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO($link, $user, $pass);

    // foreach($pdo->query('SELECT * from youtubecolores') as $fila) {
    //     print_r($fila);
    // }
    // $pdo = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
