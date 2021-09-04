<html>
<?php
    
		
	        define('FILE_ENCRYPTION_BLOCKS', 1000000);
			 if(isset($_POST['submit'])){
				 if(!empty($_POST['paper'])) {
					 $selected = $_POST['paper'];
					 echo 'You have chosen: ' . $selected;
            
            
			
					 include('dbconnect.php'); 
					 $query = "SELECT file_name  FROM file where file_name='".$selected. '.pdf.enc' . "'";
					 $result = mysqli_query($con,$query);
					 while($row = mysqli_fetch_array($result)){ 
						$file=$row['file_name'];
					 }

			$key = $_POST['key'];
			echo $key;
			decryptFile($file, $key, $selected . '.dec');
				 }
			 }
			function decryptFile($source, $key, $dest)
			{
				$key = substr(sha1($key, true), 0, 16);
				$error = false;
                if ($fpOut = fopen($dest, 'w')) {
					 if ($fpIn = fopen($source, 'rb')) {
						 $iv = fread($fpIn, 16);
						 while (!feof($fpIn)) {
							 $ciphertext = fread($fpIn, 16 * (FILE_ENCRYPTION_BLOCKS + 1)); 
                             $plaintext = openssl_decrypt($ciphertext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
               
                             $iv = substr($ciphertext, 0, 16);
                             fwrite($fpOut, $plaintext);
						}
                        fclose($fpIn);
					 }
					 else {
						 $error = true;
						}
						 fclose($fpOut);
				}
				else {
					$error = true;
				}
				 include('dbconnect.php'); 
	             $fname=$dest;
	             
	 
	             $fpath = "uploads/".$fname;
	 
	             copy($fname, $fpath);
	 
		 
                 $sql = "INSERT into file1 (file_name, uploaded_on) VALUES ('".$fname."', NOW())";
	 
                 $insert = mysqli_query($con, $sql); 
	            if(!empty($fname) && file_exists($fpath))
				{
					header("Cache-Control: public");
		            header("Content-Description: File Transfer");
		            header("Content-Disposition: attachment; filename= $fname");
		            header("Content-Transfer-Encoding: binary");
		            readfile($fpath);
		            exit;
					echo "Download successfull";
				}
				 else{
					 echo "file not exist";
					}
					 return $error ? false : $dest;
			}
			
		
		
				 
			 
			
			
	
?>
	</html>
	