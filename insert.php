<html>
<section>
<?php      

    include('dbconnect.php');  
    $uname = $_POST['username'];  
    $pass = $_POST['psw'];  
	//$resume= $_POST['file'];
      
        //to prevent from mysqli injection  
        $uname = stripcslashes($uname);  
        $pass = stripcslashes($pass); 
       		
        $uname = mysqli_real_escape_string($con, $uname);  
        $pass= mysqli_real_escape_string($con, $pass); 
        //$cgpa= mysqli_real_escape_string($con, $cgpa); 		
      
        $sql = "insert into login values('$uname','$pass')"; 
        $result = mysqli_query($con, $sql);  
             //echo "<h1 style='color:red; font-size:50px'><center> INSERTION SUCCESSFUL </center></h1>"; 
             echo '<script>alert("INSERTION SUCCESSFUL")</script>';   
		mysqli_close($con);
?>  

<form action="register.html">
<center>
<button type="submit" value="back" name="BACK" class="btn btn-primary btn-lg">BACK</button>
<form>
<center>
</section>
</html>