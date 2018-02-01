
 <?php 

 #CREATED BY: JUAN PABLO GUZMAN
 #AGE : 14

 		$correo = $_POST['email'];
 		$contraseña = $_POST['password'];

			session_start();

			  $_SESSION['email'] = $correo; 
			  $_SESSION['password'] = $contraseña;

			   

 		 $db_server = '127.0.0.1:3306';
 		 $db_user = 'root';




 		 			 $conn = mysqli_connect($db_server,$db_user);

 		 			   if (!$conn) {
 		 			     	
 		 			   	echo "Sorry Bro!<br>We couldn't connect to the database";

 		 			     			
 		 			     }  

 		 			     $select = mysqli_select_db($conn,'spleen');

 		 			       if ($select) {
 		 			       	

 		 			       		 echo "DB selected\n";
 		 			       }

 
 		 			       

 		 			$sql = "SELECT CORREO FROM usuarios WHERE CORREO='".$correo."';";

 		 		

						$retval =  mysqli_query($conn,$sql); 		 		  

 		 		 

 		 		    	if (!$retval) {
 		 		    		
 		 		    		

 		 		    			die('no query: ' . mysqli_error($conn));

 		 		    			return;

 		 		    	}

 		 		 echo "Consulta Hecha\n";

 		 		 while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) { 
 		 		 				

 		 		 				
 		 		 				


 		 		 				   if ($correo == $row['CORREO']) {
 		 		 				   	

 		 		 				   			echo "Correo Registrado\n";

 		 		$sql_two = "SELECT CONTRASENA FROM usuarios WHERE CONTRASENA='".$contraseña."';";


 		 							$retval_two = mysqli_query($conn,$sql_two);


 		 									if (!$retval_two) {
 		 		    		
 		 		    		

 		 		    					die('no query: ' . mysqli_error($conn));

 		 		    							return;

 		 		    	}

 		 		    	             echo "Segunda Consulta Hecha\n";



 		 		    while($row_two = mysqli_fetch_array($retval_two, MYSQLI_ASSOC)) { 



 		 		    					if ($contraseña == $row_two['CONTRASENA']) {
 		 		    						

 		 $sql_tree = "SELECT LINK FROM usuarios WHERE CORREO='".$correo."' AND CONTRASENA='".$contraseña."';";


 		    		$retval_tree = mysqli_query($conn,$sql_tree);


 		    						if (!$retval_tree) {
 		    							

 		    								die('No query: '.mysqli_error($conn));

 		    									return;


 		    						}

 		    							echo "Tercera Consulta Hecha\n";



 		    		$sql_check_packet = "SELECT PAQUETE FROM usuarios WHERE CORREO ='".$correo."';";


 		 			       	       $retval_check_packet =mysqli_query($conn,$sql_check_packet);

 		 			       	       			if (! $retval_check_packet) {
 		 			       	       				

 		 			       	       				die('Could not make query to check'.mysqli_error($conn));
 		 			       	       			}


 		 			       	       $row_check_packet = mysqli_fetch_array($retval_check_packet,MYSQLI_ASSOC);


 		 			       	       				$row_check_packet['PAQUETE'];

 		 			       	                 if ($row_check_packet['PAQUETE'] == '') {
 		 			       	                 	

 		 			       	                 		/*crear script en la pagina de paquetes para que 
 		 			       	                 		cunado carge, avisar con un alert al usuario que se le ha vencido el paquete */

 		 			      header('Location:http://127.0.0.1/dashboard/Spleen/Paquetes/index.html');



 		 			       	                 	return;


 		 			       	                 }


 		    							while ($row_tree = mysqli_fetch_array($retval_tree,MYSQLI_ASSOC)) {
 		    								

 		    									header('Location:'.$row_tree['LINK']);

 		    									return;

 		    							}


 		 		    							

 		 		    					}


 		 		    	             	} 


 		 		 				   }




 		 		 	   

 		 		 } 

 		 		 	header('Location:/dashboard/Spleen/Registro/index.html?r=false');

 		 		 
mysqli_close($conn);

?>


 		 		   