<?php
include_once 'conexion.php';

$sql_query_leer = 'SELECT * FROM youtubecolores';
$gsent = $pdo->prepare($sql_query_leer);
$gsent->execute();
// guardamos el array de la Conexion
$resultado = $gsent->fetchAll();

// bar_dump($resultado);

//agregar
if($_POST){

  $color = $_POST['color'];
  $descripcion = $_POST['descripcion'];
  $sql_query_insertar = 'INSERT INTO youtubecolores (color,descripcion) VALUES (?,?)';
  $sentencia_agregar = $pdo->prepare($sql_query_insertar);
  $sentencia_agregar->execute(array($color,$descripcion));

  header('location:index.php');
}
if($_GET){
  $id = $_GET['id'];
  $sql_query_unico = 'SELECT * FROM youtubecolores WHERE id=?';
  $gsent_unico = $pdo->prepare($sql_query_unico);
  $gsent_unico->execute(array($id));
  $resultado_unico = $gsent_unico->fetch();
}

 ?>

 <!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <!--Para probar Iconos-->
        <script src="https://kit.fontawesome.com/f77068196a.js" crossorigin="anonymous"></script>

     <title>Hello, world!</title>
   </head>
   <body>
     <div class="container mt-5">

       <div class="row">
         <div class="col-md-6">

           <?php
           foreach ($resultado as $dato):?>
             <div class="alert alert-<?php echo($dato['color']) ?> text-uppercase" role="alert">
              <?php echo($dato['color']) ?> - <?php echo($dato['descripcion']) ?>
              <a href="eliminar.php?id=<?php echo($dato['id']) ?> " class="float-right">
                <i class="fa fa-trash ml-3" aria-hidden="true"></i>
              </a>
               <a href="index.php?id=<?php echo($dato['id']) ?> " class="float-right">
                 <i class="fa fa-pencil" aria-hidden="true"></i>
               </a>
            </div>
          <?php endforeach ?>

         </div>
         <div class="col-md-6">
           <?php if(!$_GET): ?>
           <form class="" method="POST" >
             <h2>Elements add </h2>
             <input class="form-control  mt-3" type="text" name="color" value="" required>
             <input class="form-control  mt-3" type="text" name="descripcion" value="" required>
             <button class="btn btn-primary mt-3" name="button">Add</button>
           </form>
         <?php endif ?>
         <?php if($_GET): ?>
         <form class="" method="GET" action="editar.php">
           <h2>Editar elementos </h2>
           <input class="form-control  mt-3" type="text" name="color" value="<?php echo($resultado_unico['color']) ?> ">
           <input class="form-control  mt-3" type="text" name="descripcion" value="<?php echo($resultado_unico['descripcion']) ?> ">
           <input type="text" name="id" class="d-none" value="<?php echo($resultado_unico['id']) ?>">
           <button class="btn btn-primary mt-3" name="button">Update</button>
         </form>
       <?php endif ?>

         </div>

       </div>

     </div>
     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   </body>

   <?php
   $pdo = null;
    ?>
 </html>
