<?php 
  $db = mysqli_connect('localhost', 'root', '', 'test');
  $phone = "";
  $email = "";
  if (isset($_POST['submit'])) {
  	$phone = $_POST['phone'];
  	$email = $_POST['email'];

  	$sql_u = "SELECT * FROM reg WHERE phone='$phone'";
  	$sql_e = "SELECT * FROM reg WHERE email='$email'";
  	$res_u = mysqli_query($db, $sql_u);
  	$res_e = mysqli_query($db, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... phone already taken"; 	
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry... email already taken"; 	
  	}else{
           $query = "INSERT INTO reg (phone, email) 
      	    	  VALUES ('$phone', '$email')";
           $results = mysqli_query($db, $query);
           echo 'New record inserted sucessfully!';
           exit();
           
  	}
  }
?>