<?php 
    include('db.php');

    if(isset($_GET['id'])){
        $Id = $_GET['id'];
        echo $Id;
        $query = "DELETE FROM tarea WHERE Id = $Id";

        $result = mysqli_query($conn,$query);
        if(!$result){
            die('Query Failed');
        }

        $_SESSION['message'] = 'Tarea Eliminada satisfactoriamente';
        $_SESSION['message_type'] = 'danger';

        header("Location: index.php");
    }
?>