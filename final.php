
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
  
        button:hover{
            color:black;
            background-color: rgb(17, 247, 197);
            cursor: pointer;
        }
  .inp{
            cursor: not-allowed;
        } 
    
    </style>
</head>
<body>
<?php

$hid=$_POST['hotelid'];
$phone=$_POST['phone'];
$pkg=$_POST['pkgno'];
$date=$_POST['date'];
$ppl=$_POST['noppl'];
$days=$_POST['nodays'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travelagency";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
$sql1="SELECT fare FROM packages where pkgno='$pkg'";
$sql2="SELECT price FROM hotels where hotelid='$hid'";
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

if ($result1->num_rows > 0) 
{
    $row1 = $result1->fetch_assoc();
    $fare=$row1["fare"];
} 
else 
{
    echo "0 results";
}
if ($result2->num_rows > 0) 
{
    $row = $result2->fetch_assoc();
    $price=$row["price"];
} 
else 
{
    echo "0 results";
}
function generate_id($phone,$hid,$pkg)
{
    $id=substr($phone,3,3);
    $id=$pkg.$id.$hid;
    $otp=rand(0,100);
    $id=$otp.$id;
    return $id;
}
function total_cost($ppl,$fare,$days,$price)
{
    $res1=$ppl*$fare;
    $res2=$days*$price;
    $result=$res1+$res2;
    return $result;
}
$cost=total_cost($ppl,$fare,$days,$price);
$book_id=generate_id($phone,$hid,$pkg);

$query ="INSERT INTO `bookings` ()
     VALUES ('$book_id', '$hid', '$phone', '$pkg', '$date', '$ppl', '$days', '$cost','pending')";
   $conn->query($query);
$conn->close();

?>
     <div class= "background-image"></div>
  <div class="container">
    <form class="modal-content animate" method="post" action="test.php">
        <div class="input-group">
        <label for="id"><b>Booking id</b></label>
        <input type="text" class="inp" name="id" value="<?php echo @$book_id; ?>"required readonly>
        </div>
        <div class="input-group">
            <label for="cost"><b>Total Cost</b></label>
            <input type="text" class="inp" name="cost" value="<?php echo @$cost; ?>"required readonly>
        </div>
        <div class="btn">
            <button type="submit" class="btn" name="confirm" ><b>CONFIRM<b></button>
        </div>
  </form>
</div>

</body>
</html>