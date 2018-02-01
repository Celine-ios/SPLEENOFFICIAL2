<?php

session_start();

$_SESSION['email'];

$db_server = '127.0.0.1:3306';
$user = 'root';

$conn = mysqli_connect($db_server, $user);

if (!$conn) {

    die('Could not connect to Database Server' . mysqli_error($conn));

    return;

}

$select = mysqli_select_db($conn, 'spleen');

if (!$select) {

    die('Could not Select Database' . mysqli_error($conn));

    return;

}

$sql = "SELECT PAQUETE FROM usuarios WHERE CORREO='" . $_SESSION['email'] . "';";

$retval = mysqli_query($conn, $sql);

if (!$retval) {

    die('Could not make query' . mysqli_error($conn));

    return;

}

$row = mysqli_fetch_array($retval, MYSQLI_ASSOC);

$row['PAQUETE'];

function put_new_gain($new_gain)
{

    $_SESSION['email'];

    $db_server = '127.0.0.1:3306';
    $user = 'root';

    $conn = mysqli_connect($db_server, $user);

    mysqli_select_db($conn, 'spleen');

    //se conecta al servidor y pide la ganancia actual del usuario

    $sql_new_gain = "SELECT GANANCIA FROM usuarios WHERE CORREO='" . $_SESSION['email'] . "';";

    $query_new_gain = mysqli_query($conn, $sql_new_gain);

    if (!$query_new_gain) {

        die('Could not make query' . mysqli_error($conn));

        return;
    }

    $row_new_gain = mysqli_fetch_array($query_new_gain, MYSQLI_ASSOC);

    /*se adiciona la ganancia por pelicula vista y pasa a
    alterarse en el servidor */

    $gain = $row_new_gain['GANANCIA'] + $new_gain;

    $sql_alter_gain = "UPDATE usuarios SET GANANCIA=" . $gain . " WHERE CORREO='" . $_SESSION['email'] . "';";

    $query_alter_new_gain = mysqli_query($conn, $sql_alter_gain);

    if (!$query_alter_new_gain) {

        die('No se pudo cambiar la ganancia' . mysqli_error($conn));

        return;
    }

    echo $gain;
}

switch ($row['PAQUETE']) {

    case 'basic':

        $gain_on_basic = 3.74;

        put_new_gain($gain_on_basic);

        break;

    case 'estandar':

        $gain_on_estandar = 5.25;

        put_new_gain($gain_on_estandar);

        break;

    case 'premium':

        $gain_on_premium = 6.74;

        put_new_gain($gain_on_premium);

        break;

    default:

        echo "No tiene un paquete válido";

        break;
}

mysqli_close($conn);
