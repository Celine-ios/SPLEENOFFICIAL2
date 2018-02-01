<?php
#reports.php

$db_server = '127.0.0.1:3306';
$user = 'root';

session_start();

$_SESSION['email'];

$conn = mysqli_connect($db_server, $user);

if (!$conn) {

    die('Could not connect to db server' . mysqli_error($conn));

    return;
}

$select = mysqli_select_db($conn, 'spleen');

if (!$select) {

    die('Could not select DB' . mysqli_error($conn));

    return;

}

$sql = "SELECT USUARIO FROM usuarios WHERE CORREO='" . $_SESSION['email'] . "';";

$retval = mysqli_query($conn, $sql);

if (!$retval) {

    die('Sorry,NO QUERY' . mysqli_error($conn));

    return;
}

$row = mysqli_fetch_array($retval, MYSQLI_ASSOC);

$sql_two = "SELECT * FROM " . $row['USUARIO'] . ";";

$retval_two = mysqli_query($conn, $sql_two);

if (!$retval_two) {

    die('Sorry,NO QUERY' . mysqli_error($conn));

    return;

}

while ($row_two = mysqli_fetch_array($retval_two, MYSQLI_ASSOC)) {

    # code...

    $html_out = "

                <tr>
                  <td>1</td>

                  <td>" . $row_two['USUARIO'] . "</td>
                  <td>" . $row_two['CORREO'] . "</td>
                  <td>" . $row_two['GANANCIA'] . "</td>

               </tr>

             ";

    echo $html_out;

/* despues de sacar de la db el nombre
de usuario para entrar a la tabla de afiliados
que tiene el nombre de usuario*/

}

?>

