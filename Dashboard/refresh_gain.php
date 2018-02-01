<?php
#refresh_gain.php

	session_start();

    $_SESSION['email'];
    $_SESSION['password'];


      		$db_server = '127.0.0.1:3306';
 		 $db_user = 'root';


 		  	$conn = mysqli_connect($db_server,$db_user);


 		  	    if (! $conn) {
 		  	    	

 		  	    	die('Could not connect to database server'.mysqli_error($conn));

 		  	    }


 		  	    $select = mysqli_select_db($conn,'spleen');


 		  	       if (! $select) {
 		  	       	

 		  	       			die('Could not select Database'.mysqli_error($conn));
 		  	       }

$sql = "SELECT GANANCIA FROM usuarios WHERE CONTRASENA='".$_SESSION['password']."' AND CORREO='".$_SESSION['email']."';";

                     $retval = mysqli_query($conn,$sql);


                       if (! $retval) {
                       	
                       		die('Could not make query'.mysqli_error($conn));

                       }


                       $row = mysqli_fetch_array($retval,MYSQLI_ASSOC);


                       			echo $row['GANANCIA'];




?>