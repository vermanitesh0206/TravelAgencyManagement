 <?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    form, .content {
    width: 30%;
    margin: 0px auto;
    padding: 20px;
    border: 1px solid #B0C4DE;
    background: linear-gradient(-39deg, rgb(0, 204, 255), rgb(231, 136, 250));
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.671), 0 6px 20px 0 rgba(0, 0, 0, 0.678);
    border-radius: 0px 0px 10px 10px;
  }
    </style>
</head>
<body>

  <div class= "background-image"></div>

  <div class="container">
  
  <form class="modal-content animate" method="post" action="register.php">
    <?php include('errors.php'); ?>
    <h1>Sign Up</h1>
    <hr>
  	<div class="input-group">
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>

      </div>
      
  	<div class="input-group">
      <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Enter FullName" name="cname" required>
    </div>
      
  	<div class="input-group">
      <label for="phone"><b>Phone</b></label>
      <input type="tel" placeholder="Enter Phone no." name="phone" required>
    </div>
      
  	<div class="input-group">
      <label for="aadhar"><b>Aadhar</b></label>
      <input type="text" placeholder="Enter Aadhar no." name="aadhar" required>
              
     </div>
     
    <div class="input-group">
    <label for="psw" ><b>Password</b></label>
    <input type="password" id="psw" placeholder="Enter Password" name="psw" required>         
    </div>

    <div class="input-group">
    <label for="psw-repeat" ><b>Confirm Password</b></label>
    <input type="password" id="pswrpt" placeholder="Confirm Password" name="psw-repeat" required>
    </div>
    
  	<div class="btn">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    
  	<p>
  		Already a member? <a href="login.php"><strong>Sign in<strong></a>
    </p>
    </form>
</div>

  
</body>
</html>