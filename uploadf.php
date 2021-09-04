<html>
<?php
 include('dbconnect.php');

$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$file = basename($_FILES["file"]["name"]);
$fileName =  $file . '.enc';
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('txt','pdf','docx','enc','dec');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
			$sql = "INSERT into file (file_name, uploaded_on) VALUES ('".$fileName."', NOW())";
        $insert = mysqli_query($con, $sql); 
            //$insert = $db->query("INSERT into file (file_name, uploaded_on) VALUES ('".$fileName."', date(" \of F Y h:i:s A"))");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}
else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
mysqli_close($con);
?>
</html>