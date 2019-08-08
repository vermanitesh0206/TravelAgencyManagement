
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Choose hotels</title>
</head>
<body>

<style>

    * {
        margin: 0px;
        padding: 0px;
    }
    body{
            position: relative;
            box-sizing: border-box;
            padding: 0%;
            margin: auto;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 700;
            font-family: Poppins-Bold;
            text-shadow: 0 1px 1px #1f1c18;
            width:100%;
            height: auto;
            background-repeat:no-repeat;
            background-size: cover;
           
            
    }

    .popup { 
            position: fixed; 
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
            
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 65%;
            background: linear-gradient(-39deg, rgb(0, 204, 255), rgb(231, 136, 250));
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.671), 0 6px 20px 0 rgba(0, 0, 0, 0.678);
             /* Could be more or less, depending on screen size */
        }

        #pkg {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #pkg td, #pkg th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #pkg tr:nth-child(even){background-color: #f2f2f2;}

        #pkg tr:hover {background-color:#e9afab;}

        #pkg th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #605df7;
            color: white;
        }

        #head{
            text-align:center;
            color:#353535;
            padding:20px;
            margin:10px;
            text-decoration: underline;
        }

         img{
            width:100%;
            height: auto;
            filter: blur(2px) brightness(150%) saturate(100%);
           
        }

        input{
            border:none;
            border-radius:20px;
            color:#353535;
            padding:9px;
            margin:20px;
            text-align:center;
        }

        .input{
            text-align:center;
            position:relative;
            bottom:70px;
        }

        button{
            border:none;
            border-radius:10px;
            color:#000000;
            background: #ff33ff;
            padding:9px;
            margin:20px;   
        }
        button:hover{
            color:black;
            background-color: rgb(17, 247, 197);
            cursor: pointer;
        }
        .input .inp{
            cursor: not-allowed;
        }

        


</style>

 <?php $_pkg=$_POST['pkg'];?>   
    <img src="pic.jpg" >
<div id= "modal" class="popup">  
       
        <div class="modal-content">
            
            <h3 id="head">Please choose the Hotel</h3>
              
        <table id="pkg">
            <tr>
                <th>Hotel id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Rating</th>
                <th>Location</th>
            </tr> 

            <?php 
                 
              $username = "";
              $email    = "";
              $errors = array(); 

              // connect to the database
              $db = mysqli_connect('localhost', 'root', '', 'travelagency');

                //echo $_pkg;
             

              if (isset($_POST['sub_pkg'])) {
                  
                 $hotel=mysqli_real_escape_string($db, $_POST['pkg']);

                 $_SESSION['hotel']= $hotel;
              
                  $sql= "SELECT hotelid,hname,price,rating,location FROM hotels,packages WHERE location=destination and pkgno='$_pkg';";
                  $results = mysqli_query($db, $sql);
                  if (mysqli_num_rows($results) > 0)
                  {
                      while($row= mysqli_fetch_assoc($results))
                      {
                          echo  "<tr><td>". $row["hotelid"] ."</td><td>" . $row["hname"] ."</td><td>". $row["price"] ."</td><td>" .$row["rating"] ."</td><td>" .$row["location"] . "</td></tr>";
                      }
                      echo "</table>";  

                  }            

                  else{
                      array_push($errors, "Please enter valid hotel");
                  }
              }

              mysqli_close($db);
            ?> 
            <div style="margin-top:100px;"></div>

            <form class="input" method="post" action="index3.php">
                <label for="pkgl">selected pkg</label>
                <input type="text" class="inp" name="pkgg" value="<?php echo @$_pkg; ?>" readonly/>
                <br>
                <label for="pkgl">Enter hotel_id</label>
                <input type="text" name="hotel">
                <br>
                <button><b>Continue Booking<b></button>
            </form>
            
            </div>
    </div>


</body>
</html>