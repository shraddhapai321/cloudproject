<html>
<head>

<div id="mySidepanel" class="sidepanel">

  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"> &times;</a>
  
  <br>
  <a href="admin1.php">HOME</a>
  <br>
  <a href="register.html">REGISTER A NEW USER</a>
  <br>
  <a href="upload.html">UPLOAD A NEW PAPER</a>
  <br>
  <a href="first.html">LOGOUT</a>
</div>
<button class="openbtn" onclick="openNav()">&#9776; MENU</button>
<center><b><h1 style="color:#9a25b8;font-size:70px">WELCOME</h1></b></center>

<center><b><h2 style="color:#9a25b8;font-size:40px">DATABASE ENTRIES</h1></b></center><br>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.btn-group button {
  background-color: #9a25b8; /* Green background */
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  padding: 40px 50px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  width: 50%; /* Set a width if needed */
  height:20%;
  display: block;
  font-size:30px;
}

.btn-group button:not(:last-child) {                
  border-bottom: none;
}

.btn-group button:hover {
  background-color: #48227a;
}
.registerbtn {
  background-color: #9a25b8;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
  }
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:700,300);

.frame {
	position: absolute;
	top: 50%;
	left: 50%;
	width: 400px;
	height: 400px;
	margin-top: -200px;
	margin-left: -200px;
	border-radius: 2px;
	box-shadow: 4px 8px 16px 0 rgba(0, 0, 0, 0.1);
	overflow: hidden;
	background: linear-gradient(to top right, darkmagenta 0%, hotpink 100%);
	color: #333;
	font-family: "Open Sans", Helvetica, sans-serif;
}

.center {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 300px;
	height: 260px;
	border-radius: 3px;
	box-shadow: 8px 10px 15px 0 rgba(0, 0, 0, 0.2);
	background: #fff;
	display: flex;
	align-items: center;
	justify-content: space-evenly;
	flex-direction: column;
}

.title {
	width: 100%;
	height: 50px;
	border-bottom: 1px solid #999;
	text-align: center;
}

h1 {
	font-size: 16px;
	font-weight: 300;
	color: #666;
}

.dropzone {
	width: 100px;
	height: 80px;
	border: 1px dashed #999;
	border-radius: 3px;
	text-align: center;
}

.upload-icon {
	margin: 25px 2px 2px 2px;
}

.upload-input {
	position: relative;
	top: -62px;
	left: 0;
	width: 100%;
	height: 100%;
	opacity: 0;
}

.btn {
	display: block;
	width: 140px;
	height: 40px;
	background: darkmagenta;
	color: #fff;
	border-radius: 3px;
	border: 0;
	box-shadow: 0 3px 0 0 hotpink;
	transition: all 0.3s ease-in-out;
	font-size: 14px;
}

.btn:hover {
	background: rebeccapurple;
	box-shadow: 0 3px 0 0 deeppink;
}
/* The sidepanel menu */
.sidepanel {
  height: 350px; /* Specify a height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0;
  left: 0;
  background-color: #E2CDF4; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidepanel */
  border :1px solid black;
}

/* The sidepanel links */
.sidepanel a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 35px;
  color:rebeccapurple;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidepanel a:hover {
  color: white;
  background-color:rebeccapurple;
}

/* Position and style the close button (top right corner) */
.sidepanel .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 0px;
}

/* Style the button that is used to open the sidepanel */
.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color:rebeccapurple;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color:#9a25b8;
}
</style>
</head>
 <body style="background-image:url(https://preview.pixlr.com/images/800wm/1143/1/1143152070.jpg); background-size:100% 100% ">
 <center>
 
<?php
include('dbconnect.php');
echo "<h3 style='color: rebeccapurple;'>REGISTERED USERS</h3>";
$query = "SELECT username FROM login"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);


echo "<table style='border: 1px solid black; width:30%; color: rebeccapurple;'>"; // start a table tag in the HTML
while($row = mysqli_fetch_array($result)){  
 //Creates a loop to loop through results
echo "<tr ><td>" . $row['username'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML
echo "<br>";
echo "<h3 style='color: rebeccapurple;'>ENCRYPTED FILES</h3>";
$query = "SELECT file_name,uploaded_on FROM file"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);
echo "<table style='border: 1px solid black; width:70%; color: rebeccapurple;'>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr ><td>" . $row['file_name'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>";
echo "<br>";
echo "<h3 style='color: rebeccapurple;'>DECRYPTED FILES</h3>";
$query = "SELECT file_name,uploaded_on FROM file1"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);
echo "<table style='border: 1px solid black; width:70%; color: rebeccapurple;'>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr ><td>" . $row['file_name'] . "</td></tr>";
  //$row['index'] the index here is a field name
echo "<br>";
}

echo "</table>";
mysqli_close($con);
?>
<!--<div class="content">
 <div class="btn-group btn-group-sm">
 <center> 
 <form action="registration.html">
 <button style="height:20%">REGISTER A NEW USER</button>
 </form></center>
 </div>
 <form action="open.html">
<button type="submit" class="registerbtn" style="width:10%;">LOGOUT</button>

</form>	
 <br><br>
 <div class="btn-group btn-group-sm">
 <center> <form action="uploadfile.html">
 <button style="height:20%">UPLOAD A NEW PAPER</button>
 </form></center>
 </div>
 <br><br><br>
 </div>
 <center>
 
 
</center>-->
</center>
<script>
function openNav() {
  document.getElementById("mySidepanel").style.width = "450px";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}
</script>

 </body>

</html>