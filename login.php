<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
  <form class="modal-content animate" method="post" action="login.php">
      <?php include('errors.php'); ?>
        <div class="imgcontainer">
            <img src="pic1.png" alt="Avatar" class="avatar">
        </div>
      
    <div class="input-group">
      <label for="uname"><b>E-mail</b></label>
      <input type="text" placeholder="Enter E-mail-id" name="uname" required>
    </div>
    <div class="input-group">
        <label for="psw"><b>Password</b></label>
         <input type="password" placeholder="Enter Password" name="psw" required>
    </div>
    <div class="btn">
        <button type="submit" class="btn" name="login_user" >Login</button>
    </div>
  	<p>
  		Not yet a member? <a href="register.php"><strong>Sign up</strong></a>
    </p>
    </div>
  </form>
</div>
</div>
</body>
</html>