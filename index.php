<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
          <p>Nombre:</p>
            <input type="text" name="nombre" class="form-control" placeholder="" autofocus>
          </div>
          <div class="form-group">
          <p>Descripcion:</p>
            <input type="text" name="descripcion" class="form-control" placeholder="" autofocus>
          </div>
          <div class="form-group">
          <p>Precio:</p>
            <input type="text" name="precio" class="form-control" placeholder="" autofocus>
          </div>
          <div class="form-group">
          <p>Cantidad:</p>
            <input type="text" name="cantidad" class="form-control" placeholder="" autofocus>
          </div>
          <div class="form-group">
          <p>Tamaño:</p>
            <input type="text" name="tamano" class="form-control" placeholder="" autofocus>
          </div>
          <div class="form-group">
          <p>Peso del producto:</p>
            <input type="text" name="peso" class="form-control" placeholder="" autofocus>
          </div>
          <div class="form-group">
            <p>Fecha</p>
          <input type="date" id="fecha" name="fecha" value="<?php echo date("Y-m-d");?>">
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Guardar producto">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
          <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Cantidad en stock</th>
            <th>Tamaño</th>
            <th>Peso</th>
            <th>Fecha de lanzamiento</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
          <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td><?php echo $row['cantidad']; ?></td>
            <td><?php echo $row['tamano']; ?></td>
            <td><?php echo $row['peso']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
