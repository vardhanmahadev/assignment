  
<?php

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	
	// Database validation
	if(preg_match("/^[ a-zA-Z ]*$/",$firstname)){
		if(preg_match("/^[ a-zA-Z ]*$/",$lastname)){
			$username = filter_var($username, FILTER_VALIDATE_EMAIL); 
				if($username==true){
					if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/",$password)){
					if($password==$confirmpassword){
						// Database connection
							$conn = new mysqli('localhost','root','','test');
							if($conn->connect_error){
							echo "$conn->connect_error";
							die("Connection Failed : ". $conn->connect_error);
							} 
							mysqli_query($conn,"INSERT INTO `registration` (`ID`, `firstname`, `lastname`, `username`, `password`, `confirmpassword`) VALUES (NULL, '$firstname', '$lastname', '$username', '$password', '$confirmpassword');");
							echo " you have succesfully registered!";
							echo "<br>";
							echo "<br>";
							echo " Your Registration Deatils";
							echo "<br>";
							echo "<br>";
							echo " First Name : $firstname ";
							echo "<br>";
							echo " Last Name : $lastname ";
							echo "<br>";
							echo " User Name : $username ";
						}
							else{	
								echo "your passwords don't match";
							}
					}
					else{
						echo " your password must contain atleast one capital letter, one small letter, one special character and lenght range from 6 to 20 characters";
					}
		
					}	
						else{							
							exit("email is not valid");
						}					
		}
			else{
				exit(" Last Name not valid");
		}
	}
	else{
		exit(" First Name not valid");
		
	}
	
?>