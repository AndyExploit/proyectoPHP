<?php

session_start(); //esto es para almacenar en sesion

$conn = mysqli_connect(
    'localhost:3306',
    'root',
    '12345',
    'php_crud'
);
?>