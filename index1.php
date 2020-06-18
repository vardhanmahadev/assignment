  
<?php
  
	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
mysqli_query($conn,"INSERT INTO `registration` (`ID`, `firstname`, `lastname`, `username`, `password`, `confirmpassword`) VALUES (NULL, '$firstName', '$lastName', '$username', '$password', '$confirmpassword');");
echo " you have succesfully registered!!"	

?>