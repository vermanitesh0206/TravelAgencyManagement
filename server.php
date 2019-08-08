<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'travelagency');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['cname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $aadhar = mysqli_real_escape_string($db, $_POST['aadhar']);
  $password_1 = mysqli_real_escape_string($db, $_POST['psw']);
  $password_2 = mysqli_real_escape_string($db, $_POST['psw-repeat']);

  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
 $user_check_query = "SELECT * FROM customers WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  

  if ($username) 
  { 
    if ($user['email'] === $email) 
    {
      array_push($errors, "email already exists");
    }
  }  


  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query ="INSERT INTO `customers` ()
      VALUES ('$aadhar', '$username', '$phone', '$password_1', '$email')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['uname']);
  $password = mysqli_real_escape_string($db, $_POST['psw']);

  if (count($errors) == 0) {
  //	$password = md5($password);
  	$query = "SELECT email, pswd FROM customers WHERE email='$email' AND pswd='$password' ";
    $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) 
        {
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now logged in";
          header('location: index2.php');
        }
        else 
        {
          array_push($errors, "Wrong username/password combination");
        } 
  }
}
//BOOKING




mysqli_close($db);

?>