<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $precio = $_POST['precio'];
  $cantidad = $_POST['cantidad'];
  $tamano = $_POST['tamano'];
  $peso = $_POST['peso'];
  $fecha = $_POST['fecha'];

  $query = "INSERT INTO task(nombre, descripcion,precio,cantidad,tamano,peso,fecha) VALUES ('$nombre', '$descripcion','$precio','$cantidad','$tamano','$peso','$fecha')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Producto guardado con exito!';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
