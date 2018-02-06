<?php

  #searcher_ficha.php

		
		$seek_param = $_GET['q'];

		      $user = '';

		      	$db_server = 'www.spleen1.com:3306';

		      	  $conn = mysqli_connect($user,$db_server);


		      	        if (! $conn) {
		      	        	

		      	        	  die('Sorry We could not connect to the server'.mysqli_error($conn));

		      	        	    return;
		      	        }


		      	            $select_db = mysqli_select_db($conn, 'spleen');


		      	                 


     ?>

