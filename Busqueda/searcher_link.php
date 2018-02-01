<?php

#searcher.php

/* Para devolver los resultados de la busqueda en la base de
datos solo necesitas imprimir el resultado con una sentencia echo */

$seek_param = $_GET['q'];

#user and pass for DB server
$user = 'root';
$db_server = '127.0.0.1:3306';

#connect to database
$conn = mysqli_connect($db_server, $user);

#if not
if (!$conn) {

    die('Could not connect to db server' . mysqli_error($conn));
}

#select a database

$select = mysqli_select_db($conn, 'spleen');

#if not

if (!$select) {

    die('Could not select DB' . mysqli_error($conn));

}

#query to send

$sql = "SELECT LINK FROM peliculas WHERE TITULO LIKE '" . $seek_param . "%';";

#querying to database server

$retval = mysqli_query($conn, $sql);

#if not

if (!$retval) {

    die('Could not send Query' . mysqli_error($conn));

}

$row = mysqli_fetch_array($retval, MYSQLI_ASSOC);

echo $row['LINK'];

session_start();

$_SESSION['video_seleccionado'] = $row['LINK'];

?>