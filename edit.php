<?php
include("db.php");
$nombre = '';
$descripcion='';
$precio = '';
$cantidad = '';
$tamano = '';
$peso = '';
$fecha = '';

if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $nombre = $row['nombre'];
      $descripcion = $row['descripcion'];
      $precio = $row['precio'];
      $cantidad = $row['cantidad'];
      $tamano = $row['tamano'];
      $peso = $row['peso'];
      $fecha = $row['fecha'];
  
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  if (isset($_POST['update'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $tamano = $_POST['tamano'];
    $peso = $_POST['peso'];
    $fecha = $_POST['fecha'];

    $query = "UPDATE task set nombre = '$nombre', descripcion = '$descripcion',precio = '$precio',cantidad = '$cantidad',tamano = '$tamano',peso = '$peso',fecha = '$fecha' WHERE id=$id";
    mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizacion exitosa!';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualizar">
        </div>
        <div class="form-group">
          <input name="descripcion" type="text" class="form-control" value="<?php echo $descripcion; ?>" placeholder="Actualizar">
        </div>
        <div class="form-group">
          <input name="precio" type="text" class="form-control" value="<?php echo $precio; ?>" placeholder="Actualizar">
        </div>
        <div class="form-group">
          <input name="cantidad" type="text" class="form-control" value="<?php echo $cantidad; ?>" placeholder="Actualizar">
        </div>
        <div class="form-group">
          <input name="tamano" type="text" class="form-control" value="<?php echo $tamano; ?>" placeholder="Actualizar">
        </div>
        <div class="form-group">
          <input name="peso" type="text" class="form-control" value="<?php echo $peso; ?>" placeholder="Actualizar">
        </div>
        <div class="form-group">
          <input type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>" placeholder="Actualizar">
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
