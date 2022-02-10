<?php
include("db.php");
$Titulo = '';
$Descripcion= '';

if(isset($_GET['id'])) {
    $Id = $_GET['id'];
    $query = "SELECT * FROM tarea WHERE Id=$Id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $Titulo = $row['Titulo'];
      $Descripcion = $row['Descripcion'];
    }
}

if (isset($_POST['editar'])) {
    $Id = $_GET['id'];
    $Titulo= $_POST['Titulo'];
    $Descripcion = $_POST['Descripcion'];
  
    $query = "UPDATE tarea set Titulo = '$Titulo', Descripcion = '$Descripcion' WHERE Id=$Id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Tarea editada correctamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');
  }

?>

<?php include('includes/header.php'); ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editarTarea.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group mb-3">
                            <input name="Titulo" type="text" class="form-control" value="<?php echo $Titulo; ?>" placeholder="Editar Titulo">
                        </div>
                        <div class="form-group mb-3">
                            <textarea name="Descripcion" class="form-control" cols="30" rows="10"><?php echo $Descripcion;?></textarea>
                        </div>
                        <button class="btn btn-success" name="editar">
                            Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include('includes/footer.php'); ?>