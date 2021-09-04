<?php      
    //$host = "localhost";  
	$host = "sql6.freesqldatabase.com";
    //$user= "root";  
    $user = "sql6414113";
    //$password = '';  
	$password = 'VqnseCPhCE';
    //$db_name = "cloud_project";  
	$db_name = "sql6414113";
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
	mysqli_select_db($con,"sql6414113");
	
?>  