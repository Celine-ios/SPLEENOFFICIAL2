<?php
#add_afiliados.php

session_start();

$_SESSION['email'];

$afiliado_pasword = $_POST['email_afiliado'];

$afiliado_email = $_POST['password_afiliado'];

$db_Server = '127.0.0.1:3306';
$user = 'root';

$conn = mysqli_connect($db_Server, $user);

if (!$conn) {

    die('Could not connect' . mysqli_error($conn));

    return;

}

$select = mysqli_select_db($conn, 'spleen');

if (!$select) {

    die('Could not connect to the database' . mysqli_error($conn));
}

$sql = "SELECT USUARIO FROM usuarios WHERE CORREO='" . $_SESSION['email'] . "';";

$query = mysqli_query($conn, $sql);

if (!$query) {

    die('Could not make query' . mysqli_error($conn));

    return;
}

$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

if (!$row) {

    die('Couldnot make it' . mysqli_error($conn));
}

$sql_two = "SELECT USUARIO,GANANCIA,CORREO FROM usuarios WHERE CORREO='" . $afiliado_email . "' AND CONTRASENA='" . $afiliado_pasword . "';";

$afiliado_query = mysqli_query($conn, $sql_two);

if (!$afiliado_query) {

    die('Could not make query' . mysqli_error($conn));

    return;
}

while ($row_two = mysqli_fetch_array($afiliado_query, MYSQLI_BOTH)) {

    $sql_insert_afiliado = "INSERT INTO " . $row['USUARIO'] . "(CORREO,USUARIO) VALUES('" . $afiliado_email . "','" . $row_two['USUARIO'] . "');";

    $query_insert_afiliado = mysqli_query($conn, $sql_insert_afiliado);

    echo $sql_insert_afiliado;

    if (!$query_insert_afiliado) {

        die('Sorry We could not register your afiliate' . mysqli_error($conn));

        return;
    }

    echo "Afiliado Registrado";

}

if (!$row_two) {

    die('Couldnot' . mysqli_error($conn));

    return;
}
?>