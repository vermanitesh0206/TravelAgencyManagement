<?php
    session_start();
    $phone=$_SESSION['phone'];
    $id=$_POST['book_id'];
    //echo $id;
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
    $sql= "SELECT status FROM bookings WHERE bookid= '$id';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
        $status=$row["status"];
    }
    else 
    {
        echo "oops something went wrong";
        header('location: index2.php');
    }
    if($status==='pending')
        $query="update bookings set status ='confirmed' where bookid='$id'";

    else
        $query="update bookings set status ='cancelled' where bookid='$id'";

    if ($conn->query($query)===TRUE) 
    {
        header('location: display.php');
    } 
    else 
    {
        echo "oops something went wrong";
        header('location: index2.php');
    }

    $conn->close();
?>