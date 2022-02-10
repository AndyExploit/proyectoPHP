<?php
    include("db.php");
    include("includes/header.php");

    date_default_timezone_set("America/El_Salvador");

    $fecha = date("Y-m-d H:i:s");
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

        <?php if(isset($_SESSION['message'])){ ?> <!-- comprueba si existe el mensaje -->
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> <?= $_SESSION['message'] ?> <!-- muestra el mensaje -->
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php session_unset();/*Esto limpia los datos en sesion*/ } ?>

            <div class="card card-body">
                <form action="guardarTarea.php" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="titulo" class="form-control" placeholder="titulo de la tarea" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="Descripcion" rows="2" class="form-control" placeholder="descripcion de tarea"></textarea>
                    </div>
                    <div class="form-group mb-3" style="display:none">
                        <input type="datetime" name="FechaRegistro" value="<?= $fecha ?>">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar_tarea" value="Guardar">
                </form>
            </div>
        </div>

        <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>fecha de Registro</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM tarea";
                    $result_tareas = mysqli_query($conn, $query);    

                    while($row = mysqli_fetch_assoc($result_tareas)) { ?> <!-- recorrer cada array de el result_tareas y guardar la fila en row -->

                    <tr>
                        <td><?php echo $row['Titulo'] ?></td>
                        <td><?php echo $row['Descripcion'] ?></td>
                        <td><?php echo $row['FechaRegistro'] ?></td>
                        <td>
                            <a class="" href="editarTarea.php?id=<?php echo $row['Id']?>">
                                Editar
                            </a>
                            <a class="" href="eliminarTarea.php?id=<?php echo $row['Id']?>">
                                Eliminar
                            </a>
                        </td>
                    </tr>

                    <?php } ?>
            </tbody>
        </table>
        
        </div>
    </div>
</div>

<?php 
    include("includes/footer.php");
?>