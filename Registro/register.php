<?php

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$dbhost = 'localhost:3306';
$db_user = 'root';

$conn = mysqli_connect($dbhost, $db_user);

if (!$conn) {

#die('Could not connect: ' . mysqli_error());

    echo "No pudimos conectar con la DB";

}

echo "Connected successfully\n";

$select = mysqli_select_db($conn, 'spleen');

if ($select) {

    echo "Seleccionamos una DB\n";
}

$sql = "INSERT INTO usuarios (USUARIO,CORREO,CONTRASENA,LINK) VALUES ('" . $username . "','" . $email . "','" . $password . "','/dashboard/Spleen/Busqueda/index.html');";

$retval = mysqli_query($conn, $sql);

if (!$retval) {

    die('Could not make the query: ' . mysqli_error($conn));

    return;
}

echo "Se insertaron\n";

$sql_two = "CREATE TABLE " . $username . " (

    USUARIO VARCHAR(200),
    CORREO VARCHAR(200),
    PAQUETE VARCHAR(200),
    GANANCIA FLOAT,

PRIMARY KEY(CORREO)
);";

$retval_two = mysqli_query($conn, $sql_two);

if (!$retval_two) {

    die('Could not make the query: ' . mysqli_error($conn));

    return;
}

echo "Se creo la tabla para afiliados";

header('location: /dashboard/Spleen/Inicio%20Sesion/index.html');

mysqli_close($conn);
