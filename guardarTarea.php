<?php
include("db.php");

if(isset($_POST['guardar_tarea'])){
    $Titulo = $_POST['titulo'];
    $Descripcion = $_POST['Descripcion'];
    $FechaNacimiento = $_POST['FechaNacimiento'];
    $FechaRegistro = $_POST['FechaRegistro'];

    $query = "INSERT INTO tarea(Titulo,Descripcion,Edad,FechaRegistro) VALUES ('$Titulo','$Descripcion','$FechaNacimiento','$FechaRegistro')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed");
    }

    $_SESSION['message'] = 'Tarea Guardada satisfactoriamente';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}
?>